<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class PaymentOrder extends Component
{
    use AuthorizesRequests;

    public $order;

    protected $listeners = ['payOrder'];

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function payOrder()
    {
        $this->order->status = Order::RECIBIDO;
        $this->order->save();

        return redirect()->route('orders.show', $this->order);
    }
    
    public function render()
    {
        $this->authorize('author', $this->order);
        $this->authorize('payment', $this->order);

        $items = $this->order->orderdetails;

        return view('livewire.payment-order', compact('items'))->layout('layouts.store');
    }
}
