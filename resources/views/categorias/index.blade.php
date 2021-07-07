<x-store-layout>
    <div class="container py-2">
        <h1 class="text-lg font-bold text-gray-700 mt-1 mb-2">
            Lista de Categorías
        </h1>
        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($categorias as $categoria)
                <li class="bg-white rounded-lg shadow">
                    <article>
                        <figure>
                            @isset($categoria->image)
                                <img class="h-full w-full object-cover object-center" src="{{ Storage::url($categoria->image) }}" alt="">
                            @endisset
                        </figure>

                        <div class="py-1 px-3">
                            <h1 class="text-center font-semibold text-gray-700">
                                <a href="{{ route('categorias.show', $categoria) }}">
                                    {{Str::limit($categoria->name, 20)}}
                                </a>
                            </h1>
                        </div>

                        <div class="px-3 mb-3">
                            <x-button-enlace href="{{ route('categorias.show', $categoria) }}" color="red" class="w-full">
                                Ver Categoría
                            </x-button-enlace>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>    
                
        <div class="mt-4">
            {{$categorias->links()}}
        </div>
    </div>
</x-store-layout>