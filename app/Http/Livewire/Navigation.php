<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $categories = Category::all();
        $categorias = Categoria::where('status', '=', Categoria::PUBLICADO)
                            ->orderBy('name', 'ASC')
                            ->get();

        return view('livewire.navigation', compact('categories', 'categorias'));
    }
}
