<?php

namespace App\Http\Livewire\Carousel;

use App\Models\Catalog;
use Livewire\Component;

class CarouselCatalog extends Component
{
    public $catalogs = [];

    public $catalogoUrl;

    public function loadCatalogs()
    {
        $this->catalogs = Catalog::where('status', '=', Catalog::PUBLICADO)
                                ->orderBy('id', 'DESC')
                                ->take(8)->get();

        $this->emit('glider', 'catalog');
    }
    
    public function render()
    {
        return view('livewire.carousel.carousel-catalog');
    }
}
