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
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;

        $this->quantity = qty_available($item->id, $item->options->color_id);
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.update-cart-item-color');
    }
}