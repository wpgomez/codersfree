<div wire:init="loadCatalogs">
    @if (count($catalogs))
      <div class="glider-contain">
        <ul class="glider-catalog">
          @foreach ($catalogs as $catalog)
            <li class="bg-white {{ $loop->last ? '' : 'mr-2' }}">
              <article>
                <figure>
                  @if ($catalog->image)
                    <img class="h-full w-full object-cover object-center" src="{{ Storage::url($catalog->image) }}" alt="">
                  @endif
                </figure>
  
                <div class="py-4 px-3">
                  <h1 class="text-sm font-semibold hover:text-red-500">
                    <a href="{{ 'http://192.168.1.106:8080/#/catalogo/' . $catalog->id }}">
                      {{Str::limit($catalog->title, 25)}}
                    </a>
                  </h1>
                </div>

                <div class="px-3 mb-2">
                    <x-button-enlace href="{{ 'http://192.168.1.106:8080/#/catalogo/' . $catalog->id }}" color="red" class="w-full">
                        Ver Catálogo
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
 