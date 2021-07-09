<div>
    <form action="{{route('unete.store')}}" method="post">
        @csrf
        <div class="mb-2">
            <label for="nombres" class="block text-sm font-bold text-gray-700">
                Nombres <strong class="text-red-600">*</strong>
            </label>
            <div class="mt-1">
                <input type="text" name="nombres" wire:model.defer="nombres" 
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
                <input type="text" name="apellidos" wire:model.defer="apellidos" 
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
                <input type="text" name="telefono" wire:model.defer="telefono" 
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
                <input type="text" name="correo" wire:model.defer="correo" 
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
                <input type="text" name="direccion" wire:model.defer="direccion" 
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                    placeholder="Ingrese su dirección...">
            </div>
            @error('direccion')
                <p class="mt-2 text-sm text-red-600">
                    <strong>{{$message}}</strong>
                </p>
            @enderror   
        </div>
        <div class="grid grid-cols-2 gap-4 mb-2">
            <div>
                <label for="country_id" class="block text-sm font-bold text-gray-700">
                    País <strong class="text-red-600">*</strong>
                </label>
                <select name="country_id" wire:model="country_id" 
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" selected>Seleccione uno</option>
    
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
                @error('country_id')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{$message}}</strong>
                    </p>
                @enderror  
            </div>
            <div>
                <label for="department_id" class="block text-sm font-bold text-gray-700">
                    Departamento <strong class="text-red-600">*</strong>
                </label>
                <select name="department_id" wire:model="department_id" 
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" selected>Seleccione uno</option>
    
                    @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{$message}}</strong>
                    </p>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-2">
            <div>
                <label for="province_id" class="block text-sm font-bold text-gray-700">
                    Provincia <strong class="text-red-600">*</strong>
                </label>
                <select name="province_id" wire:model="province_id" 
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" selected>Seleccione uno</option>
    
                    @foreach ($provinces as $province)
                        {{-- <option value="{{$province->id}}" {{ old('province_id') == $province->id ? 'selected' : '' }}>{{$province->name}}</option> --}}
                        <option value="{{$province->id}}">{{$province->name}}</option>
                    @endforeach
                </select>
                @error('province_id')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{$message}}</strong>
                    </p>
                @enderror  
            </div>
            <div>
                <label for="district_id" class="block text-sm font-bold text-gray-700">
                    Distrito <strong class="text-red-600">*</strong>
                </label>
                <select name="district_id" wire:model="district_id" 
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" selected>Seleccione uno</option>
    
                    @foreach ($districts as $district)
                        {{-- <option value="{{$district->id}}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{$district->name}}</option> --}}
                        <option value="{{$district->id}}">{{$district->name}}</option>
                    @endforeach
                </select>
                @error('district_id')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{$message}}</strong>
                    </p>
                @enderror
            </div>
        </div>
        <div class="mb-2">
            <label for="momentcontact_id" class="block text-sm font-bold text-gray-700">
                ¿En qué momento podemos llamarlo? <strong class="text-red-600">*</strong>
            </label>
            <select name="momentcontact_id" wire:model="momentcontact_id" 
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" selected>Seleccione uno</option>

                @foreach ($momentcontacts as $momentcontact)
                    <option value="{{$momentcontact->id}}">{{$momentcontact->name}}</option>
                @endforeach
            </select>
            @error('momentcontact_id')
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
