<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItemColor extends Component
{
    public $rowId, $qty;
    public $quantity;
    
    public function mount()
    {
        Cart::instance('shopping');
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;

        $this->quantity = qty_available($item->id, $item->options->color_id);
    }

    public function decrement()
    {
        Cart::instance('shopping');
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function increment()
    {
        Cart::instance('shopping');
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.update-cart-item-color');
    }
}
