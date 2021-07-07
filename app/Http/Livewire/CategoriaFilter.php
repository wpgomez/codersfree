<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaFilter extends Component
{
    use WithPagination;

    public $categoriaId;

    public $categoria;

    public $categorias = [];

    public $view = 'grid';

    public function limpiar()
    {
        $this->reset(['categoriaId', 'categoria']);
    }

    public function mount()
    {
        $this->categoria = Categoria::find($this->categoriaId);

        $this->categorias = Categoria::where('status', '=', Categoria::PUBLICADO)
                                ->orderBy('name', 'ASC')
                                ->get();
    }

    public function render()
    {
        if ($this->categoriaId) {
            $this->categoria = Categoria::find($this->categoriaId);
            if ($this->categoria) {
                $modelos = $this->categoria->modelos()
                                ->where('status', '=', Modelo::PUBLICADO)
                                ->paginate(12);
            } else {
                $modelos = [];
            }
        } else {
            $modelos = Modelo::where('status', '=', Modelo::PUBLICADO)
                            ->paginate(12);
        }
        
        return view('livewire.categoria-filter', compact('modelos'));
    }
}
