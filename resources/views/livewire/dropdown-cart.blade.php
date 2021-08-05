<div>
    <x-jet-dropdown width='96'>
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart size="30" color="gray" />

                @if (Cart::count())
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">{{ Cart::count()}}</span>
                @else
                    <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full"></span>
                @endif
            </span>
        </x-slot>
        <x-slot name="content">
            @if (Cart::count())
                <div class="py-2 px-3 border-b border-gray-200 flex justify-between items-center">
                    <div>
                        <p class="text-lg text-gray-700 mt-2 mb-2"><span class="font-bold">Total: S/ {{ Cart::subtotal() }}</span></p>
                    </div>
                    <div>
                        <x-button-enlace href="{{ route('shopping-cart') }}" color="red" class="w-full">
                            Ir al carrito
                        </x-button-enlace>
                    </div>
                </div>
            @endif

            <ul>
                @forelse ($items as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                        <article class="flex-1">
                            <div class="flex">
                                <h1 class="font-bold">{{$item->name}}</h1>
                                @isset($item->options['color'])
                                    <p class="ml-2">- {{$item->options['color']}}</p>
                                @endisset

                                @isset($item->options['talla'])
                                    <p>, {{$item->options['talla']}}</p>
                                @endisset
                            </div>
                            <div class="flex">
                                <p>{{$item->qty}}</p>
                                <p class="mx-2">x</p>
                                <p class="font-bold">S/ {{number_format($item->price, 2, '.', ',')}}</p>    
                            </div>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            @if (Cart::count())
                <div class="py-2 px-3 flex justify-between items-center">
                    <div>
                        <p class="text-lg text-gray-700 mt-2 mb-2"><span class="font-bold">Total: S/ {{ Cart::subtotal() }}</span></p>
                    </div>
                    <div>
                        <x-button-enlace href="{{ route('shopping-cart') }}" color="red" class="w-full">
                            Ir al carrito
                        </x-button-enlace>
                    </div>
                </div>
            @endif
        </x-slot>
    </x-jet-dropdown>
</div>
