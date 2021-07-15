<x-store-layout>
    <div class="container py-6">
        
        @livewire('categoria-filter', [
                'categoriaId' => $categoria->id
            ])
    </div>
</x-store-layout>