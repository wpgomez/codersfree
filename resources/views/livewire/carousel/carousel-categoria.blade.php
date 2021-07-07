<div wire:init="loadCategorias">
    @if (count($categorias))
      <div class="glider-contain">
        <ul class="glider-categoria">
          @foreach ($categorias as $categoria)
            <li class="bg-white {{ $loop->last ? '' : 'mr-2' }}">
              <article>
                <figure>
                  @isset ($categoria->image)
                    <img class="h-full w-full object-cover object-center" src="{{ Storage::url($categoria->image) }}" alt="">
                  @endisset
                </figure>
  
                <div class="py-1 px-3">
                  <a href="{{ route('categorias.show', $categoria) }}">
                    <h1 class="font-semibold text-center">
                      {{Str::limit($categoria->name, 25)}}
                    </h1>
                  </a>
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
      
        <button aria-label="Previous" class="glider-prev"><i class="fas fa-chevron-circle-left w-2 h-2"></i></button>
        <button aria-label="Next" class="glider-next"><i class="fas fa-chevron-circle-right"></i></button>
        <div role="tablist" class="dots"></div>
      </div>
    @else
      <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
        <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
      </div>		
    @endif
    
</div>
 