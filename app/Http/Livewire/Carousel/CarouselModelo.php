<?php

namespace App\Http\Livewire\Carousel;

use App\Models\Modelo;
use Livewire\Component;

class CarouselModelo extends Component
{
    public $modelos = [];

    public function loadModelos()
    {
        $this->modelos = Modelo::where('status', '=', Modelo::PUBLICADO)
                                ->orderBy('created_at', 'DESC')
                                ->take(8)->get();

        $this->emit('glider', 'modelo');
    }

    public function render()
    {
        return view('livewire.carousel.carousel-modelo');
    }
}
