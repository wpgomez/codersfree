<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">
                @if ($categoria)
                    {{$categoria->name}}
                @endif
            </h1>
            
            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-orange-500' : '' }}" wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-orange-500' : '' }}" wire:click="$set('view', 'list')"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-center mb-2">Categorías</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($categorias as $categoriaAux)
                    <li class="py-2 text-sm {{ $categoriaId == $categoriaAux->id ? 'bg-red-600 text-white' : '' }}">
                        <a class="cursor-pointer px-2 capitalize flex items-center" 
                            wire:click="$set('categoriaId', '{{$categoriaAux->id}}')">
                                {{$categoriaAux->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            
            <x-button-enlace color="red" class="w-full mt-4" wire:click='limpiar()'>
                Eliminar Filtros
            </x-button-enlace>
        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($modelos as $modelo)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    @if (count($modelo->images)>0)
                                        <a href="{{ route('modelos.show', $modelo) }}">
                                            <img class="h-full w-full object-cover object-center" src="{{ Storage::url($modelo->images->first()->url) }}" alt="">
                                        </a>
                                    @endif
                                </figure>

                                <div class="py-1 px-3">
                                    <h1 class="text-center font-semibold">
                                        <a href="{{ route('modelos.show', $modelo) }}">
                                            {{Str::limit($modelo->name, 25)}}
                                        </a>
                                    </h1>

                                    <p class="text-center font-bold text-trueGray-700">
                                        S/ {{number_format($modelo->price, 2, '.', ',')}}
                                    </p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>    
            @else
                <ul>
                    @foreach ($modelos as $modelo)
                        <x-modelo-list :modelo="$modelo" />
                    @endforeach
                </ul>
            @endif
            
            <div class="mt-4">
                {{$modelos->links()}}
            </div>
        </div>


    </div>
</div>
