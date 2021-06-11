<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartItemSize extends Component
{
    public $product, $sizes;
    public $qty = 1;
    public $quantity = 0;

    public $size_id = "";
    public $color_id = "";

    public $colors = [];
    public $options = [];

    public function mount()
    {
        $this->sizes = $this->product->sizes;
        if (count($this->product->images)>0) {
            $this->options['image'] = Storage::url($this->product->images->first()->url);
        } else {
            $this->options['image'] = '';
        }
    }

    public function updatedSizeId($value)
    {
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size'] = $size->name;
        $this->options['size_id'] = $size->id;
        if ($this->color_id) {
            $this->quantity = qty_available($this->product->id, $this->color_id, $size->id);
        }
    }

    public function updatedColorId($value)
    {
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id, $size->id);
        $this->options['color'] = $color->name;
        $this->options['color_id'] = $color->id;
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }
   
    public function addItem()
    {
        Cart::add([
                'id' => $this->product->id, 
                'name' => $this->product->name, 
                'qty' => $this->qty, 
                'price' => $this->product->price, 
                'weight' => 0,
                'options' => $this->options
            ]);
        
        $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);

        $this->reset('qty');
        
        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
