<?php

use App\Models\Producto;
use Gloudemans\Shoppingcart\Facades\Cart;

function quantity($producto_id)
{
    $producto = Producto::find($producto_id);

    $quantity = 0;
    if ($producto) {
        $quantity = $producto->stock;
    }

    return $quantity;
}

function qty_added($producto_id)
{
    Cart::instance('shopping');
    $cart = Cart::content();

    $item = $cart->where('id', $producto_id)
                ->first();

    if ($item) {
        return $item->qty;
    } else {
        return 0;
    }
}

function qty_available($producto_id)
{
    return quantity($producto_id) - qty_added($producto_id);
}

function discount($item)
{
    $producto = Producto::find($item->id);
    if ($producto) {
        $qty_available = $producto->stock - qty_added($item->id);

        $producto->stock = $qty_available;
        $producto->save();
    }
}

function increase($item)
{
    $producto = Producto::find($item->producto_id);
    if ($producto) {
        $quantity = $producto->stock + $item->qty;

        $producto->stock = $quantity;
        $producto->save();
    }
}
