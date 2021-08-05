<?php

namespace App\Http\Livewire\Pedido;

use App\Models\Ejercicio;
use App\Models\Mes;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPedido extends Component
{
    use WithPagination;

    public $search;
    public $ej_id = "", $mes_id = "";
    public $ejs, $meses;
    
    public function mount()
    {
        $this->ejs = Ejercicio::where('code', '<=', date("Y"))
                                ->orderBy('code', 'DESC')
                                ->take(5)->get();
        $this->ej_id = date('Y');

        $this->meses = Mes::all();
        $this->mes_id = date('n');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedEjId()
    {
        $this->resetPage();
    }

    public function updatedMesId()
    {
        $this->resetPage();
    }

    public function refresh()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        if ($this->mes_id !== "0") {
            $orders = Order::where('user_id', auth()->user()->id)
                    ->where('contact', 'like', '%' . $this->search . '%')
                    ->whereYear('created_at', $this->ej_id)
                    ->whereMonth('created_at', $this->mes_id)
                    ->paginate(10);
        } else {
            $orders = Order::where('user_id', auth()->user()->id)
                    ->where('contact', 'like', '%' . $this->search . '%')
                    ->whereYear('created_at', $this->ej_id)
                    ->paginate(10);
        }
        
        return view('livewire.pedido.index-pedido', compact('orders'))
                ->layout('layouts.store');
    }
}
