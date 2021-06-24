<?php

namespace App\Http\Livewire\Carousel;

use App\Models\Categoria;
use Livewire\Component;

class CarouselCategoria extends Component
{
    public $categorias = [];

    public function loadCategorias()
    {
        $this->categorias = Categoria::where('status', '=', Categoria::PUBLICADO)
                                    ->orderBy('name', 'ASC')
                                    ->take(8)->get();

        $this->emit('glider', 'categoria');
    }

    public function render()
    {
        return view('livewire.carousel.carousel-categoria');
    }
}
