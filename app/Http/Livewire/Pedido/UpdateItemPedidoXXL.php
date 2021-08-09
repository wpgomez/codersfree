<?php

namespace App\Http\Livewire\Pedido;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateItemPedidoXXL extends Component
{
    public $rowId, $qty, $qtyTotal;

    public function mount()
    {
        Cart::instance('pedido');
        $item = Cart::get($this->rowId);

        $this->qty = $item->options->qtyXXL;
        $this->qtyTotal = $item->options->qtyTotal;
    }

    public function decrement()
    {
        Cart::instance('pedido');
        $this->qty = $this->qty - 1;
        $this->qtyTotal = $this->qtyTotal - 1;

        Cart::update($this->rowId, 
            [
                'options' => [
                    'qtyXXL' => $this->qty,
                    'qtyTotal' => $this->qtyTotal
                ]
            ]);
                
        $this->emitUp('render');
    }

    public function increment()
    {
        Cart::instance('pedido');
        $this->qty = $this->qty + 1;
        $this->qtyTotal = $this->qtyTotal + 1;

        Cart::update($this->rowId, 
            [
                'options' => [
                    'qtyXXL' => $this->qty,
                    'qtyTotal' => $this->qtyTotal
                ]
            ]);
        
        $this->emitUp('render');
    }

    public function render()
    {
        return view('livewire.pedido.update-item-pedido-x-x-l');
    }
}
