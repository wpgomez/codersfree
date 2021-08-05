<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    protected $listeners = ['render'];

    public function destroy()
    {
        Cart::instance('shopping');
        Cart::destroy();

        $this->emitTo('dropdown-cart', 'render');
    }

    public function delete($rowId)
    {
        Cart::instance('shopping');
        Cart::remove($rowId);

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        Cart::instance('shopping');
        $items = Cart::content();
        return view('livewire.shopping-cart', compact('items'))
                    ->layout('layouts.store');
    }
}
