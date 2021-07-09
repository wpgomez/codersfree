<x-store-layout>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">
            <div class="relative">
                <div class="{{ ($order->status >= 2 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-1.5 mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>

            <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div>

            <div class="relative">
                <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>

                <div class="absolute -left-1 mt-0.5">
                    <p>Enviado</p>
                </div>
            </div>

            <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div>

            <div class="relative">
                <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-2 mt-0.5">
                    <p>Entregado</p>
                </div>
            </div>

        </div>

        <div class="bg-white rounded-lg shadow-lg px-4 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span>Nro. Orden:</span> PED-{{$order->id}}</p>

            @if ($order->status == 1)
                <x-button-enlace class="ml-auto" href="{{route('orders.payment', $order)}}">
                    Ir a Enviar
                </x-button-enlace>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow-lg p-4 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>

                    @if ($order->envio_type == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda.</p>
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

        <div class="bg-white rounded-lg shadow-lg p-4 text-gray-700 mb-6">
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
                                        src="{{$item->options->image}}" alt="">
                                    <article>
                                        <h1 class="font-bold">{{$item->name}}</h1>
                                        <div class="flex">
                                            @isset ($item->options->color)
                                                <p class="text-sm">{{$item->options->color}}</p>
                                            @endisset

                                            @isset ($item->options->talla)
                                                <p class="text-sm">, {{$item->options->talla}}</p>
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>

                            <td class="text-center">
                                <p class="text-sm">S/ {{number_format($item->price,2,'.',',')}}</p>
                            </td>

                            <td class="text-center">
                                <p class="text-sm">{{$item->qty}}</p>
                            </td>

                            <td class="text-center">
                                <p class="text-sm">S/ {{number_format($item->qty * $item->price,2,'.',',')}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="bg-white rounded-lg shadow-lg p-4 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6">
                <div class="text-gray-700">
                    <p class="flex justify-between items-center font-semibold">
                        Subtotal
                        <span class="text-lg">
                            S/ {{number_format($order->total-$order->shipping_cost,2,'.',',')}}
                        </span>
                    </p>
                </div>
                <div class="text-gray-700">
                    <p class="flex justify-between items-center font-semibold">
                        Envío
                        <span class="text-lg">
                            S/ {{number_format($order->shipping_cost,2,'.',',')}}
                        </span>
                    </p>
                </div>
                <div class="text-gray-700">
                    <hr class="mb-3 md:hidden">
                    <p class="flex justify-between items-center font-semibold">
                        Total
                        <span class="text-lg">
                            S/ {{number_format($order->total,2,'.',',')}}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-store-layout>