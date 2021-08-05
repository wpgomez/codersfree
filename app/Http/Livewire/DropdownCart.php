<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class DropdownCart extends Component
{
    protected $listeners = ['render'];

    public function render()
    {
        Cart::instance('shopping');
        $items = Cart::content();
        return view('livewire.dropdown-cart', compact('items'));
    }
}
