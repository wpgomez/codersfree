<div>

    <form action="{{route('unete.store')}}" method="post">
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
            <label for="direccion" class="block text-sm font-bold text-gray-700">
                Dirección <strong class="text-red-600">*</strong>
            </label>
            <div class="mt-1">
                <input type="text" name="direccion" value="{{old('direccion')}}"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                    placeholder="Ingrese su dirección...">
            </div>
            @error('direccion')
                <p class="mt-2 text-sm text-red-600">
                    <strong>{{$message}}</strong>
                </p>
            @enderror   
        </div>
        <div class="mb-2">
            <label for="llamarlo" class="block text-sm font-bold text-gray-700">
                ¿En qué momento podemos llamarlo? <strong class="text-red-600">*</strong>
            </label>
            <select name="momentcontact_id" 
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" {{ old('momentcontact_id') == '' ? 'selected' : '' }} disabled>Seleccione uno</option>

                @foreach ($momentcontacts as $momentcontact)
                    <option value="{{$momentcontact->id}}" {{ old('momentcontact_id') == $momentcontact->id ? 'selected' : '' }}>{{$momentcontact->name}}</option>
                @endforeach
            </select>
            @error('llamarlo')
                <p class="mt-2 text-sm text-red-600">
                    <strong>{{$message}}</strong>
                </p>
            @enderror  
        </div>
        <div class="mb-2">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="aceptoPolitica" name="aceptoPolitica" type="checkbox" 
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                  <label for="aceptoPolitica" class="font-medium text-gray-700">Acepto las políticas de protección de datos personales</label>
                </div>
            </div>
            @error('aceptoPolitica')
                <p class="mt-2 text-sm text-red-600">
                    <strong>{{$message}}</strong>
                </p>
            @enderror  
        </div>
        <x-button color="red">Enviar información</x-button>
    </form>
</div>
