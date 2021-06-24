<x-store-layout>
    {{-- <div class="mb-2">
        <figure>
            <img class="w-full h-auto object-cover object-center" src="{{Storage::url('home/fila-1.jpg')}}" alt="">
        </figure>
    </div> --}}

    <div class="container mt-2">
        <section class="mb-2">
            <div class="flex items-center">
                <h1 class="text-lg font-semibold text-gray-700">
                Lista de Catálogos
                </h1>
                <a href="http://192.168.1.106:8080" 
                    class="text-red-600 hover:text-red-500 hover:underline ml-2 font-semibold">
                    Ver más
                </a>
            </div>
            
            @livewire('carousel.carousel-catalog')
        </section>
        
        <section class="mb-2">
            <div class="flex items-center">
                <h1 class="text-lg font-semibold text-gray-700">
                Lista de Modelos
                </h1>
                <a href="{{route('modelos.index')}}" 
                    class="text-red-600 hover:text-red-500 hover:underline ml-2 font-semibold">
                    Ver más
                </a>
            </div>
            
            @livewire('carousel.carousel-modelo')
        </section>

        <section class="mb-2">
            <div class="flex items-center">
                <h1 class="text-lg font-semibold text-gray-700">
                Lista de Categorías
                </h1>
                <a href="{{route('categorias.index')}}" 
                    class="text-red-600 hover:text-red-500 hover:underline ml-2 font-semibold">
                    Ver más
                </a>
            </div>
            
            @livewire('carousel.carousel-categoria')
        </section>
    </div>

    {{-- <div class="mb-2">
        <figure>
            <img class="w-full h-auto object-cover object-center" src="{{Storage::url('home/fila-5.jpg')}}" alt="">
        </figure>
    </div> --}}

    @push('script')
        <script>
            Livewire.on('glider', function(id){

                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [
                        {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                        },
                        {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                        }
                    ]
                });

            });
        </script>    
    @endpush
    
</x-store-layout>