<div>
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 container py-6">
        <div class="md:col-span-3">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <p class="text-gray-700 uppercase"><span>Número de orden:</span> Orden-{{$order->id}}</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class="grid grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-lg font-semibold uppercase">Envío</p>

                        @if ($order->envio_type == 1)
                            <p class="text-sm">Los productos deben ser recogidos en tienda.</p>
                            <p class="text-sm">Calle falsa 123</p>
                        @else
                            <p class="text-sm">Los productos serán enviados a:</p>
                            <p class="text-sm">{{$order->address}}</p>
                            @isset($order->department->name)
                                <p>{{$order->department->name}} - {{$order->province->name}} - {{$order->district->name}}</p>
                            @endif
                        @endif
                    </div>

                    <div>
                        <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                        <p class="text-sm">Persona que recibirá el producto: {{$order->contact}}</p>
                        <p class="text-sm">Teléfono de contacto: {{$order->phone}}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
                <p class="text-xl font-semibold mb-4">Resumen</p>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Precio</th>
                            <th>Cant.</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="flex">
                                        <img class="h-15 w-20 object-cover mr-4" 
                                            src="{{$item->image}}" alt="">
                                        <article>
                                            <h1 class="font-bold">{{$item->name}}</h1>
                                            <div class="flex text-xs">
                                                @isset ($item->color)
                                                    {{$item->color}}
                                                @endisset

                                                @isset ($item->talla)
                                                    , {{$item->talla}}
                                                @endisset
                                            </div>
                                        </article>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <span class="text-sm">S/ {{number_format($item->price,2,'.',',')}}</span>
                                </td>

                                <td class="text-center">
                                    <span class="text-sm">{{$item->qty}}</span>
                                </td>

                                <td class="text-center">
                                    <span class="text-sm">S/ {{number_format($item->qty * $item->price,2,'.',',')}}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-lg px-6 py-6">
                <div class="mb-4">
                    <div class="text-gray-700">
                        <p class="flex justify-between items-center font-semibold">
                            Subtotal
                            <span>S/ {{number_format($order->total - $order->shipping_cost,2,'.',',')}}</span>
                        </p>
                        <p class="flex justify-between items-center font-semibold">
                            Envío
                            <span>S/ {{number_format($order->shipping_cost,2,'.',',')}}</span>
                        </p>
                        <p class="flex justify-between items-center font-semibold text-lg">
                            Total
                            <span>S/ {{number_format($order->total,2,'.',',')}}</span>
                        </p>
                    </div>
                </div>

                <div>
                    <x-button 
                        color="red" 
                        class="w-full"
                        wire:click="payOrder" 
                        wire:loading.attr="disabled" 
                        wire:target="payOrder">
                        Enviar Pedido
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</div>
