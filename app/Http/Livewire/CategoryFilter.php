<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;
    
    public $category, $subcategoria, $marca;

    public function limpiar()
    {
        $this->reset(['subcategoria', 'marca']);
    }

    public function render()
    {
        $products = $this->category->products()
                            ->where('status', Product::PUBLICADO)
                            ->paginate(20);

        return view('livewire.category-filter', compact('products'));
    }
}
