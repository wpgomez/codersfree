<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UneteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\Pedido\CreatePedido;
use App\Http\Livewire\Pedido\IndexPedido;
use App\Http\Livewire\ShoppingCart;

/* Route::get('/', WelcomeController::class); */
Route::get('/', [WelcomeController::class, 'home']);

Route::get('search', SearchController::class)->name('search');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('modelos', [ModeloController::class, 'index'])->name('modelos.index');

Route::get('modelos/{modelo}', [ModeloController::class, 'show'])->name('modelos.show');

Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index');

Route::get('categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');

Route::get('catalogs', [CatalogController::class, 'index'])->name('catalogs.index');

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');

Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');

Route::get('unete', [UneteController::class, 'index'])->name('unete.index');

Route::post('unete', [UneteController::class, 'store'])->name('unete.store');

Route::middleware(['auth'])->group(function(){

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('orders/create', CreateOrder::class)->name('orders.create');

    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    
    Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment');
    
    Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');
    
    Route::get('pedidos', IndexPedido::class)->name('pedidos.index');

    Route::get('pedidos/create', CreatePedido::class)->name('pedidos.create');

    Route::get('pedidos/edit/{order}', CreatePedido::class)->name('pedidos.edit');
});
