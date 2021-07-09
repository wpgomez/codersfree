<x-store-layout>
    <div class="container py-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <img src="{{ Storage::url('home/1045-web.jpg') }}" />
            </div>
            <div>
                <h1 class="text-center text-2xl font-bold text-trueGray-700">Contáctanos</h1>
                <p class="text-center text-lg font-semibold text-trueGray-700 my-2">Ud. puede comunicarse con nosotros: llamando a los números telefónicos publicados en esta sección, enviándonos un e-mail por correo electrónico o enviarnos su consulta vía formulario.</p>
                
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

                <div class="grid grid-cols-2 gap-4 mb-2">
                    <div class="text-center">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <div class="right-info">
                            <b>Línea</b>
                            <p>(01) 372-9994</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <div class="right-info">
                            <b>Movil</b>
                            <p>(51) 949 801 537</p>
                        </div>
                    </div>
                </div>
                
                <form action="{{route('contactanos.store')}}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="nombres" class="block text-sm font-bold text-gray-700">
                            Nombres <strong class="text-red-600">*</strong>
                        </label>
                        <div class="mt-1">
                            <input type="text" name="nombres" value="{{old('nombres')}}"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                                placeholder="Ingresa tu nombres">
                        </div>
                        @error('nombres')
                            <p class="mt-2 text-sm text-red-600">
                                <strong>{{$message}}</strong>
                            </p>
                        @enderror  
                    </div>
                    <div class="mb-2">
                        <label for="apellidos" class="block text-sm font-bold text-gray-700">
                            Apellidos <strong class="text-red-600">*</strong>
                        </label>
                        <div class="mt-1">
                            <input type="text" name="apellidos" value="{{old('apellidos')}}"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                                placeholder="Ingresa tus apellidos">
                        </div>
                        @error('apellidos')
                            <p class="mt-2 text-sm text-red-600">
                                <strong>{{$message}}</strong>
                            </p>
                        @enderror  
                    </div>
                    <div class="mb-2">
                        <label for="telefono" class="block text-sm font-bold text-gray-700">
                            Teléfono <strong class="text-red-600">*</strong>
                        </label>
                        <div class="mt-1">
                            <input type="text" name="telefono" value="{{old('telefono')}}"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                                placeholder="Movil o Fijo">
                        </div>
                        @error('telefono')
                            <p class="mt-2 text-sm text-red-600">
                                <strong>{{$message}}</strong>
                            </p>
                        @enderror  
                    </div>
                    <div class="mb-2">
                        <label for="correo" class="block text-sm font-bold text-gray-700">
                            E-mail <strong class="text-red-600">*</strong>
                        </label>
                        <div class="mt-1">
                            <input type="text" name="correo" value="{{old('correo')}}"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                                placeholder="Tu correo electrónico">
                        </div>
                        @error('correo')
                            <p class="mt-2 text-sm text-red-600">
                                <strong>{{$message}}</strong>
                            </p>
                        @enderror  
                    </div>
                    <div class="mb-2">
                        <label for="mensaje" class="block text-sm font-bold text-gray-700">
                            Mensaje <strong class="text-red-600">*</strong>
                        </label>
                        <div class="mt-1">
                            <textarea name="mensaje" rows="4" 
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                                placeholder="Envíanos tus comentarios o dudas...">{{old('mensaje')}}</textarea>
                        </div>
                        @error('mensaje')
                            <p class="mt-2 text-sm text-red-600">
                                <strong>{{$message}}</strong>
                            </p>
                        @enderror   
                    </div>
                    <x-button color="red">Enviar información</x-button>
                </form>
            </div>
        </div>
    </div>
</x-store-layout>