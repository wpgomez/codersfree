<div class="container py-6">
    <section class="bg-white rounded-lg shadow-lg p-4 text-gray-700">
        <h1 class="text-lg font-semibold mb-6">CARRO DE COMPRAS</h1>

        @if (Cart::count())
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant.</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                                    <div>
                                        <p class="font-bold">{{$item->name}}</p>
                                        <div class="flex">
                                            @if ($item->options->color)
                                                <p class="text-sm">{{$item->options->color}}</p>
                                            @endif  

                                            @if ($item->options->talla)
                                                <p class="text-sm">, {{ $item->options->talla }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="text-sm">S/ {{number_format($item->price, 2, '.', ',')}}</span>
                                <a class="ml-6 cursor-pointer hover:text-red-600"
                                    wire:click="delete('{{$item->rowId}}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <td>
                                <div class="justify-center">
                                    @livewire('update-modelo-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="text-sm">S/ {{number_format($item->price * $item->qty, 2, '.', ',')}}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" 
                wire:click="destroy">
                <i class="fas fa-trash"></i>
                Borrar carrito
            </a>
        @else
            <div class="flex flex-col items-center">
                <x-cart />
                <p class="text-lg text-gray-700 mt-4">TU CARRO ESTA VACIO.</p>

                <x-button-enlace href="/" class="mt-4 px-16">
                    Ir al inicio
                </x-button-enlace>
            </div>
        @endif
    </section>

    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-4 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>
                        S/ {{Cart::subTotal()}}
                    </p>
                </div>

                <div>
                    <x-button-enlace href="{{ route('orders.create') }}">
                        Continuar
                    </x-button-enlace>
                </div>
            </div>
        </div>
    @endif
</div>
