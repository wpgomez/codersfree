<div class="flex-1 relative" x-data>

    <form action="{{ route('search') }}" autocomplete="off">
        <x-jet-input name="name" wire:model="search" type='text' class="w-full" placeholder="¿Estás buscando algún producto?" />

        <button class="absolute top-0 right-0 w-12 h-full bg-white flex items-center 
            justify-center rounded-r-md border-b border-t border-r border-gray-300">
            <x-search size="35" color="red"/>
        </button>
    </form>
    
    <div class="absolute w-full mt-1 hidden" :class="{'hidden': !$wire.open}" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($modelos as $modelo)
                    <a href="{{ route('modelos.show', $modelo) }}" class="flex">
                        @if ($modelo->images->first())
                            <img class="w-16 h-12 object-cover" src="{{ Storage::url($modelo->images->first()->url) }}" alt="">    
                        @endif
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{$modelo->name}}</p>
                            @if ($modelo->categorias->first())
                                <p>Categoría: {{$modelo->categorias->first()->name}}</p>
                            @endif
                        </div>
                    </a>
                @empty
                    <p class="text-lg leading-5">
                        No existe ningún registro con los parametros especificados
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
