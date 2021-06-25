<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class NavigationOption extends Component
{
    public function render()
    {
        $categorias = Categoria::where('status', '=', Categoria::PUBLICADO)
                            ->orderBy('name', 'ASC')
                            ->get();
                            
        return view('livewire.navigation-option', compact('categorias'));
    }
}
