<div class="container py-6" x-data="">

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 border-b bg-red-600 grid grid-cols-4">
            <div class="flex items-center col-span-3">
                <h3 class="text-lg font-medium leading-6 text-white">Listado de Pedidos</h3>
            </div>
            <div class="text-right col-span-1">
                <x-button 
                    color="red" 
                    wire:click="refresh" 
                    wire:loading.attr="disabled" 
                    wire:target="refresh">
                    <i class="fas fa-sync-alt" aria-hidden="true"></i>
                </x-button>
            </div>
        </div>
        <div class="px-4 py-5 border-b bg-white grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <x-button-enlace 
                    href="{{ route('pedidos.create') }}" 
                    color="red">
                    Nuevo
                </x-button-enlace>
            </div>
            <div class="grid grid-cols-2 gap-1">
                <div class="col-span-1">
                    <x-jet-label value="Año" />
                    <select class="form-control w-full text-xs" wire:model="ej_id">
                        @foreach ($ejs as $ej)
                            <option class="text-base" value="{{$ej->code}}">{{$ej->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-1">
                    <x-jet-label value="Mes" />
                    <select class="form-control w-full text-xs" wire:model="mes_id">
                        @foreach ($meses as $mes)
                            <option class="text-base" value="{{$mes->code}}">{{$mes->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="bg-white border-b">
          
            <x-table-responsive>
    
                @if ($orders->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nro.Pedido
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fch.Pedido
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Precio
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($orders as $order)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                        {{$order->id}}    
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                        {{$order->created_at->format('d/m/Y')}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @switch($order->status)
                                            @case(1)
                                                <span class="text-red-500">Pendiente</span>
                                                @break
                                            @case(2)
                                                <span class="text-gray-500">Recibido</span>
                                                @break
                                            @case(3)
                                                <span class="text-gray-500">Enviado</span>
                                                @break
                                            @case(4)
                                                <span class="text-gray-500">Entregado</span>
                                                @break
                                            @case(5)
                                                <span class="text-gray-500">Anulado</span>
                                                @break
                                            @default
                                                
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                        S/ {{number_format($order->total,2,'.',',')}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('pedidos.edit', $order) }}" 
                                            class="px-2 text-red-600 hover:text-red-900">
                                            Editar
                                        </a>
                                        <a href="{{ route('orders.show', $order) }}" 
                                            class="px-2 text-red-600 hover:text-red-900">
                                            Ver
                                        </a>
                                    </td>
                                </tr>
    
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="px-6 py-4">
                        No hay ningún registro coincidente
                    </div>
                @endif

            </x-table-responsive>
        
        </div>
        
        @if ($orders->hasPages())

            <div class="px-6 py-4 bg-white">
                {{$orders->links()}}
            </div>

        @endif
        
    </div>

</div>