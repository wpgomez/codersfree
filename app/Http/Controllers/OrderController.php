<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->where('user_id', auth()->user()->id);

        if (request('status')) {
            $orders = $orders->where('status', request('status'));
        }

        $orders = $orders->get();

        $pendiente = Order::where('status', Order::PENDIENTE)->where('user_id', auth()->user()->id)->count();
        $recibido = Order::where('status', Order::RECIBIDO)->where('user_id', auth()->user()->id)->count();
        $enviado = Order::where('status', Order::ENVIADO)->where('user_id', auth()->user()->id)->count();
        $entregado = Order::where('status', Order::ENTREGADO)->where('user_id', auth()->user()->id)->count();
        $anulado = Order::where('status', Order::ANULADO)->where('user_id', auth()->user()->id)->count();

        return view('orders.index', compact('orders', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }

    public function show(Order $order)
    {
        $this->authorize('author', $order);

        $items = json_decode($order->content);

        return view('orders.show', compact('order', 'items'));
    }
   
    public function pay(Order $order, Request $request)
    {
        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=APP_USR-5832790742094879-060421-114107b1c36cb1376f3a1c5fec8f19c8-770529585");

        $response = json_decode($response);

        $status = $response->status;

        if ($status == 'approved') {
            $order->status = Order::RECIBIDO;
            $order->save();
        }

        return redirect()->route('orders.show', $order);
    }
}
