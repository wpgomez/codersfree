<?php

namespace App\Http\Livewire\Pedido;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateItemPedido extends Component
{
    public $rowId; 
    public $qty04, $qty06; 
    
    public function mount()
    {
        Cart::instance('pedido');
        $item = Cart::get($this->rowId);

        $this->qty04 = $item->options->qty04;
        $this->qty06 = $item->options->qty06;
    }

    public function decrement($talla)
    {
        if ($talla == '04') {
            $this->qty04 = $this->qty04 - 1;
        }
        if ($talla == '06') {
            $this->qty06 = $this->qty06 - 1;
        }

        $this->updateCart();
    }

    public function increment($talla)
    {
        if ($talla == '04') {
            $this->qty04 = $this->qty04 + 1;
        }
        if ($talla == '06') {
            $this->qty06 = $this->qty06 + 1;
        }

        $this->updateCart();
    }

    public function updateCart()
    {
        $qtyTotal = $this->calculaTotal();

        Cart::instance('pedido');
        Cart::update($this->rowId, 
            [
                'options' => [
                    'qty04' => $this->qty04,
                    'qty06' => $this->qty06,
                    'qtyTotal' => $qtyTotal
                ]
            ]);
        
        $this->emit('render');
    }

    public function calculaTotal()
    {
        $result = $this->qty04 + $this->qty06;

        return $result;
    }

    public function render()
    {
        return view('livewire.pedido.update-item-pedido');
    }
}
