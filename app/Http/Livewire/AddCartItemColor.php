<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product;
    public $colors;
    public $color_id = "";
    public $qty = 1;
    public $quantity = 0;
    public $options = [
        'size_id' => null
    ];
    
    public function mount()
    {
        $this->colors = $this->product->colors;
        if (count($this->product->images)>0) {
            $this->options['image'] = Storage::url($this->product->images->first()->url);
        } else {
            $this->options['image'] = '';
        }
        
    }

    public function updatedColorId($value)
    {
        $color = $this->product->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id);
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
        Cart::instance('shopping');
        Cart::add([
                'id' => $this->product->id, 
                'name' => $this->product->name, 
                'qty' => $this->qty, 
                'price' => $this->product->price, 
                'weight' => 0,
                'options' => $this->options
            ]);
        
        $this->quantity = qty_available($this->product->id, $this->color_id);

        $this->reset('qty');

        $this->emitTo('dropdown-cart', 'render');
    }
  
    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
