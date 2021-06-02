<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $product;
    public $quantity;
    public $qty = 1;
    public $options = [];

    public function mount()
    {
        $this->quantity = $this->product->quantity;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
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

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
