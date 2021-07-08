<x-store-layout>
    <div class="container py-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <img src="{{ Storage::url('home/unete-02.jpg') }}" />
            </div>
            <div>
                <h1 class="text-center text-2xl font-bold text-trueGray-700">Únete a Nosotros</h1>
                <p class="text-center text-lg font-semibold text-trueGray-700 my-2">Llena estos datos y próximamente serás contactada por una de nuestras Representantes de Ventas.</p>
                
                @if (session('info'))
                    <div class="mb-2">
                        <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                            <p class="font-bold">{{session('info')}}</p>
                        </div>
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-2">
                        <div class="px-4 py-3 leading-normal text-red-500 bg-red-100 rounded-lg" role="alert">
                            <p class="font-bold">{{session('error')}}</p>
                        </div>
                    </div>
                @endif
                
                @livewire('form-unete')
            </div>
        </div>
    </div>
</x-store-layout>