<x-store-layout>
    <div class="container py-8">
        <ul>
            @forelse ($modelos as $modelo)
                <x-modelo-list :modelo="$modelo" />
            @empty
                <li class="bg-white rounded-lg shadow-2xl">
                    <div class="p-4">
                        <p class="text-lg font-semibold text-gray-700">
                            Ningún producto coincide con esos parámetros.
                        </p>
                    </div>
                </li>
            @endforelse
        </ul>

        <div class="mt-4">
            {{$modelos->links()}}
        </div>
    </div>
</x-store-layout>