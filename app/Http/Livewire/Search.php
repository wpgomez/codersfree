<?php

namespace App\Http\Livewire;

use App\Models\Modelo;
use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $open = false;

    public function updatedSearch($value)
    {
        if ($value) {
            $this->open = true;
        } else {
            $this->open = false;
        }
    }

    public function render()
    {
        if ($this->search) {
            $modelos = Modelo::where('name', 'LIKE','%' . $this->search . '%')
                                ->where('status', Modelo::PUBLICADO)
                                ->take(8)
                                ->get();
        } else {
            $modelos = [];
        }
        
        return view('livewire.search', compact('modelos'));
    }
}
