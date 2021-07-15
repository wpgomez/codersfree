<x-store-layout>
    <div class="container py-2">
        <h1 class="text-lg font-bold text-gray-700 mt-1 mb-2">
            Lista de Catálogos
        </h1>
        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($catalogs as $catalog)
                <li class="bg-white rounded-lg shadow">
                    <article>
                        <figure>
                            @isset($catalog->image)
                                <img class="h-full w-full object-cover object-center" src="{{ Storage::url($catalog->image) }}" alt="">
                            @endisset
                        </figure>

                        <div class="py-1 px-3">
                            <h1 class="text-center text-sm font-semibold text-gray-700">
                                <a href="{{ $catalogoUrl . '/#/catalogo/' . $catalog->id }}">
                                    {{Str::limit($catalog->title, 21)}}
                                </a>
                            </h1>
                        </div>

                        <div class="px-3 mb-3">
                            <x-button-enlace href="{{ $catalogoUrl . '/#/catalogo/' . $catalog->id }}" color="red" class="w-full">
                                Ver Catálogo
                            </x-button-enlace>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>    
                
        <div class="mt-4">
            {{$catalogs->links()}}
        </div>
    </div>
</x-store-layout>