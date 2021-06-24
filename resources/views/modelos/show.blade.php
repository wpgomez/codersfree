<x-store-layout>
    <div class="container py-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                @if (count($modelo->images)>0)
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach ($modelo->images as $image)
                                <li data-thumb="{{ Storage::url($image->url) }}">
                                    <img src="{{ Storage::url($image->url) }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div>
                <h1 class="text-2xl font-bold text-trueGray-700">{{ $modelo->name }}</h1>

                {{-- <div class="flex">
                    <p class="text-trueGray-700">Marca: <a class="underline capitalize hover:text-orange-500"
                            href="">{{ $product->brand->name }}</a></p>
                    <p class="text-trueGray-700 mx-6">5 <i class="fa fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-orange-500 hover:text-orange-600 underline" href="">39 reseñas</a>
                </div> --}}

                <p class="text-xl font-semibold text-trueGray-700 my-2">S/ {{number_format($modelo->price, 2, '.', ',')}}</p>
                <p class="mb-2">{!! $modelo->description !!}</p>

                {{-- <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-600">Se hace envíos a todo el Perú</p>
                            <p >Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div> --}}

               {{--  @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif --}}

                @livewire('add-modelo-cart-item', ['modelo' => $modelo])
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });

        </script>
    @endpush
</x-store-layout>
