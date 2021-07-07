@props(['modelo'])

<li class="bg-white rounded-lg shadow mb-4">
    <article class="flex">
        <figure>
            @if (count($modelo->images)>0)
                <img class="h-48 w-screen object-cover object-center" src="{{ Storage::url($modelo->images->first()->url) }}" alt="">
            @endif
        </figure>

        <div class="flex-1 py-4 px-6 flex flex-col">
            <div class="flex justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-gray-700">
                        {{$modelo->name}}
                    </h1>
                    <p class="font-bold text-gray-700">
                        S/ {{number_format($modelo->price, 2, '.', ',')}}
                    </p>
                </div>
            </div>

            <div class="mt-auto mb-6">
                <x-button-enlace color="red" href="{{ route('modelos.show', $modelo) }}">
                    Más información
                </x-button-enlace>
            </div>
        </div>
    </article>
</li>