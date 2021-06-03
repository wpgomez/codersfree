<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItemSize extends Component
{
    public $rowId, $qty;
    public $quantity;

    public function mount()
    {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;

        $this->quantity = qty_available($item->id, $item->options->color_id, $item->options->size_id);
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);

        $this->emitTo('dropdown-cart', 'render');
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId, $this->qty);

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.update-cart-item-size');
    }
}
