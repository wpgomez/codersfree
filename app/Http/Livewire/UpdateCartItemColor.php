<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateCartItemColor extends Component
{
    public $rowId;
    
    public function render()
    {
        return view('livewire.update-cart-item-color');
    }
}
