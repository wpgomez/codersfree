<x-store-layout>
    <div class="container py-8">
        
        @livewire('categoria-filter', [
                'categoriaId' => $categoria->id
            ])
    </div>
</x-store-layout>