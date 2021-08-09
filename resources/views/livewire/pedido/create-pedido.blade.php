<div class="container py-6">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-3 border-b bg-red-600 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-white">Pedido</h3>
        </div>
        <div class="px-4 py-3 border-b bg-gray-50 sm:px-6">
            <x-button 
                color="red" 
                class="py-2 px-4" 
                wire:click="create_order" 
                wire:loading.attr="disabled" 
                wire:target="create_order">
                Guardar
            </x-button>
            <x-jet-secondary-button 
                class="py-2 px-4"
                wire:click="cancel_order" 
                wire:loading.attr="disabled" 
                wire:target="cancel_order">
                Cancelar
            </x-jet-secondary-button>
        </div>
        <div class="px-4 py-5 border-b bg-white sm:p-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <div class="mb-4">
                <x-jet-label value="Nombre de contácto" />
                <x-jet-input type="text" 
                    wire:model.defer="contact" 
                    placeholder="Ingrese el nombre de la persona que recibirá el producto"
                    class="w-full"/>
                <x-jet-input-error for="contact" />
              </div>

              <div>
                <x-jet-label value="Teléfono de contácto" />
                <x-jet-input type="text" 
                    wire:model.defer="phone" 
                    placeholder="Ingrese un número de teléfono de contácto"
                    class="w-full"/>
                <x-jet-input-error for="phone" />
              </div>
            </div>

            <div x-data="{ envio_type: @entangle('envio_type') }">
              <p class="mb-3 text-lg text-gray-700 font-semibold">Envíos</p>
  
              <label class="flex items-center mb-4">
                  <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-gray-600">
                  <span class="ml-2 text-gray-700">
                      Recojo en tienda
                  </span>
                  <span class="font-semibold text-gray-700 ml-auto">
                      Gratis
                  </span>
              </label>
  
              <div>
                  <label class="flex items-center">
                      <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-gray-600">
                      <span class="ml-2 text-gray-700">
                          Envío a domicilio
                      </span>
                  </label>
  
                  <div class="py-2 pb-4 grid grid-cols-2 gap-4 hidden" :class="{ 'hidden': envio_type != 2 }">
                       {{-- Paises --}}
                       <div>
                          <x-jet-label value="País" />
  
                          <select class="form-control w-full" wire:model="country_id">
                              <option value="" disabled selected>Seleccione un País</option>
  
                              @foreach ($countries as $country)
                                  <option value="{{$country->id}}">{{$country->name}}</option>
                              @endforeach
                          </select>
  
                          <x-jet-input-error for="country_id" />
                      </div>
  
                      {{-- Departamentos --}}
                      <div>
                          <x-jet-label value="Departamento" />
  
                          <select class="form-control w-full" wire:model="department_id">
                              <option value="" disabled selected>Seleccione un Departamento</option>
  
                              @foreach ($departments as $department)
                                  <option value="{{$department->id}}">{{$department->name}}</option>
                              @endforeach
                          </select>
  
                          <x-jet-input-error for="department_id" />
                      </div>
  
                      {{-- Provincias --}}
                      <div>
                          <x-jet-label value="Provincia" />
  
                          <select class="form-control w-full" wire:model="province_id">
                              <option value="" disabled selected>Seleccione un Provincia</option>
  
                              @foreach ($provinces as $province)
                                  <option value="{{$province->id}}">{{$province->name}}</option>
                              @endforeach
                          </select>
  
                          <x-jet-input-error for="province_id" />
                      </div>
  
                      {{-- Distritos --}}
                      <div>
                          <x-jet-label value="Distrito" />
  
                          <select class="form-control w-full" wire:model="district_id">
                              <option value="" disabled selected>Seleccione un Distrito</option>
  
                              @foreach ($districts as $district)
                                  <option value="{{$district->id}}">{{$district->name}}</option>
                              @endforeach
                          </select>
  
                          <x-jet-input-error for="district_id" />
                      </div>
  
                      <div class="col-span-2">
                          <x-jet-label value="Dirección" />
                          <x-jet-input class="w-full" wire:model="address" type="text" />
                          <x-jet-input-error for="address" />
                      </div>
  
                      <div class="col-span-2">
                          <x-jet-label value="Referencia" />
                          <x-jet-input class="w-full" wire:model="references" type="text" />
                          <x-jet-input-error for="references" />
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-2 gap-4 mb-2">
                <div class="text-left">
                    <x-button 
                        color="red" 
                        class="py-2 px-4" 
                        wire:click="confirmSearchModelo" 
                        wire:loading.attr="disabled" 
                        wire:target="confirmSearchModelo">
                        +
                    </x-button>
                    <x-button 
                        color="red" 
                        class="py-2 px-4" 
                        wire:click="confirmSearchModeloConStock" 
                        wire:loading.attr="disabled" 
                        wire:target="confirmSearchModeloConStock">
                        + Stock
                    </x-button>
                </div>
                <div class="text-right">

                </div>
            </div>
            <div class="border">
                <x-table-responsive-x>
                    @if (count($items))
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-red-600">
                                <tr>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Modelo - Color
                                    </th>
                                    @foreach ($nombre_tallas as $item)
                                        @if ($columnas['talla' . $item])
                                            <th scope="col" class="p-4 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                {{$item}}
                                            </th>
                                        @endif
                                    @endforeach
                                    <th scope="col" class="p-4 text-right text-xs font-medium text-white uppercase tracking-wider">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-right text-xs font-medium text-white uppercase tracking-wider">
                                        Precio
                                    </th>
                                    <th scope="col" class="p-4 text-right text-xs font-medium text-white uppercase tracking-wider">
                                        Importe
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="p-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$item->name}}
                                        </td>
                                        @if ($columnas['talla04'])
                                            <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                                <div class="flex items-center">
                                                    <x-jet-secondary-button
                                                        :disabled="!$item->options->talla04 || $item->options->qty04 <= 0" 
                                                        wire:loading.attr="disabled" 
                                                        wire:target="decrement('{{$item->rowId}}','04')"
                                                        wire:click="decrement('{{$item->rowId}}','04')">
                                                        -
                                                    </x-jet-secondary-button>
                                            
                                                    <span class="mx-2 text-gray-700">{{$item->options->qty04}}</span>
                                            
                                                    <x-jet-secondary-button
                                                        :disabled="!$item->options->talla04" 
                                                        wire:loading.attr="disabled" 
                                                        wire:target="increment('{{$item->rowId}}','04')"
                                                        wire:click="increment('{{$item->rowId}}','04')">
                                                        +
                                                    </x-jet-secondary-button>
                                                </div>
                                            </td>
                                        @endif
                                        @if ($columnas['talla06'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla06 || $item->options->qty06 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','06')"
                                                    wire:click="decrement('{{$item->rowId}}','06')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty06}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla06" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','06')"
                                                    wire:click="increment('{{$item->rowId}}','06')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla08'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla08 || $item->options->qty08 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','08')"
                                                    wire:click="decrement('{{$item->rowId}}','08')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty08}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla08" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','08')"
                                                    wire:click="increment('{{$item->rowId}}','08')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla10'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla10 || $item->options->qty10 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','10')"
                                                    wire:click="decrement('{{$item->rowId}}','10')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty10}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla10" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','10')"
                                                    wire:click="increment('{{$item->rowId}}','10')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla12'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla12 || $item->options->qty12 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','12')"
                                                    wire:click="decrement('{{$item->rowId}}','12')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty12}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla12" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','12')"
                                                    wire:click="increment('{{$item->rowId}}','12')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla14'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla14 || $item->options->qty14 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','14')"
                                                    wire:click="decrement('{{$item->rowId}}','14')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty14}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla14" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','14')"
                                                    wire:click="increment('{{$item->rowId}}','14')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla16'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla16 || $item->options->qty16 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','16')"
                                                    wire:click="decrement('{{$item->rowId}}','16')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty16}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla16" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','16')"
                                                    wire:click="increment('{{$item->rowId}}','16')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla28'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla28 || $item->options->qty28 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','28')"
                                                    wire:click="decrement('{{$item->rowId}}','28')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty28}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla28" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','28')"
                                                    wire:click="increment('{{$item->rowId}}','28')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla30'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla30 || $item->options->qty30 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','30')"
                                                    wire:click="decrement('{{$item->rowId}}','30')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty30}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla30" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','30')"
                                                    wire:click="increment('{{$item->rowId}}','30')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla32'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla32 || $item->options->qty32 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','32')"
                                                    wire:click="decrement('{{$item->rowId}}','32')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty32}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla32" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','32')"
                                                    wire:click="increment('{{$item->rowId}}','32')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla34'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla34 || $item->options->qty34 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','34')"
                                                    wire:click="decrement('{{$item->rowId}}','34')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty34}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla34" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','34')"
                                                    wire:click="increment('{{$item->rowId}}','34')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla36'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla36 || $item->options->qty36 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','36')"
                                                    wire:click="decrement('{{$item->rowId}}','36')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty36}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla36" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','36')"
                                                    wire:click="increment('{{$item->rowId}}','36')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla38'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla38 || $item->options->qty38 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','38')"
                                                    wire:click="decrement('{{$item->rowId}}','38')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty38}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla38" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','38')"
                                                    wire:click="increment('{{$item->rowId}}','38')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla40'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla40 || $item->options->qty40 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','40')"
                                                    wire:click="decrement('{{$item->rowId}}','40')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty40}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla40" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','40')"
                                                    wire:click="increment('{{$item->rowId}}','40')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla42'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla42 || $item->options->qty42 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','42')"
                                                    wire:click="decrement('{{$item->rowId}}','42')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty42}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla42" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','42')"
                                                    wire:click="increment('{{$item->rowId}}','42')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['talla44'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla44 || $item->options->qty44 <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','44')"
                                                    wire:click="decrement('{{$item->rowId}}','44')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qty44}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->talla44" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','44')"
                                                    wire:click="increment('{{$item->rowId}}','44')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['tallaU'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaU || $item->options->qtyU <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','U')"
                                                    wire:click="decrement('{{$item->rowId}}','U')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qtyU}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaU" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','U')"
                                                    wire:click="increment('{{$item->rowId}}','U')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['tallaXS'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaXS || $item->options->qtyXS <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','XS')"
                                                    wire:click="decrement('{{$item->rowId}}','XS')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qtyXS}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaXS" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','XS')"
                                                    wire:click="increment('{{$item->rowId}}','XS')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['tallaS'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaS || $item->options->qtyS <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','S')"
                                                    wire:click="decrement('{{$item->rowId}}','S')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qtyS}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaS" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','S')"
                                                    wire:click="increment('{{$item->rowId}}','S')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['tallaM'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaM || $item->options->qtyM <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','M')"
                                                    wire:click="decrement('{{$item->rowId}}','M')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qtyM}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaM" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','M')"
                                                    wire:click="increment('{{$item->rowId}}','M')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['tallaL'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaL || $item->options->qtyL <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','L')"
                                                    wire:click="decrement('{{$item->rowId}}','L')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qtyL}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaL" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','L')"
                                                    wire:click="increment('{{$item->rowId}}','L')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['tallaXL'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaXL || $item->options->qtyXL <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','XL')"
                                                    wire:click="decrement('{{$item->rowId}}','XL')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qtyXL}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaXL" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','XL')"
                                                    wire:click="increment('{{$item->rowId}}','XL')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                        @if ($columnas['tallaXXL'])
                                        <td class="p-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaXXL || $item->options->qtyXXL <= 0" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="decrement('{{$item->rowId}}','XXL')"
                                                    wire:click="decrement('{{$item->rowId}}','XXL')">
                                                    -
                                                </x-jet-secondary-button>
                                        
                                                <span class="mx-2 text-gray-700">{{$item->options->qtyXXL}}</span>
                                        
                                                <x-jet-secondary-button
                                                    :disabled="!$item->options->tallaXXL" 
                                                    wire:loading.attr="disabled" 
                                                    wire:target="increment('{{$item->rowId}}','XXL')"
                                                    wire:click="increment('{{$item->rowId}}','XXL')">
                                                    +
                                                </x-jet-secondary-button>
                                            </div>
                                        </td>
                                        @endif
                                                                                                                        
                                        <td class="p-4 whitespace-nowrap text-right text-sm text-gray-500">
                                            {{number_format($item->options->qtyTotal,0,'.',',')}}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-right text-sm text-gray-500">
                                            S/ {{number_format($item->price,2,'.',',')}}
                                            <a class="ml-4 cursor-pointer hover:text-red-600"
                                                wire:click="delete_item('{{$item->rowId}}')"
                                                wire:loading.class="text-red-600 opacity-25"
                                                wire:target="delete_item('{{$item->rowId}}')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-right text-sm text-gray-500">
                                            S/ {{number_format($item->price * $item->options->qtyTotal,2,'.',',')}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-4 text-center">
                            No hay ningún registro coincidente
                        </div>
                    @endif
    
                </x-table-responsive-x>
            </div>
        </div>
        <div class="px-4 py-3 border-t bg-gray-50 sm:px-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <x-jet-label value="Comentario" />
                <textarea class="w-full form-control" rows="4"
                    wire:model.defer="comment"
                    placeholder="Ingrese algún comentario"></textarea>
            </div>
            <div>
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">S/ {{number_format($subtotal,2,'.',',')}}</span>
                </p>
                <p class="flex justify-between items-center">
                    Envío
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            Gratis
                        @else
                            S/ {{number_format($shipping_cost,2,'.',',')}}
                        @endif
                    </span>
                </p>
      
                <hr class="mt-4 mb-3">
      
                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                    @if ($envio_type == 1)
                        S/ {{number_format($subtotal,2,'.',',')}}
                    @else
                        S/ {{number_format($total,2,'.',',')}}
                    @endif
                </p>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="confirmingSearchModelo">
        <x-slot name="title">
            <div class="grid grid-cols-4">
                <div class="flex items-center col-span-3">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Listado de Modelos</h3>
                </div>
                <div class="text-right col-span-1">
                    <x-button 
                        color="red" 
                        wire:click="searchModelo" 
                        wire:loading.attr="disabled" 
                        wire:target="searchModelo">
                        <i class="fas fa-sync-alt" aria-hidden="true"></i>
                    </x-button>
                </div>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="border">
                <div class="p-4 border-b">
                    <x-jet-input type="text"
                        wire:model="search_modelo"
                        class="w-full"
                        placeholder="Ingrese el nombre del Modelo que quiere buscar" />
        
                </div>
                <div>
                    <x-table-responsive>
                        @if (count($searchItems))
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-red-600">
                                    <tr>
                                        <th></th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Modelo
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Color
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Precio
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($searchItems as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                                <input type="checkbox" value="{{$item->id}}" wire:model.defer="selectedSearchModelo"
                                                    class="focus:ring-red-500 h-4 w-4 text-red-600 border-gray-300 rounded">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                {{$item->modelo_name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                {{$item->color_name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                                S/ {{number_format($item->price,2,'.',',')}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-4">
                                No hay ningún registro coincidente
                            </div>
                        @endif
                    </x-table-responsive>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button 
                color="red" 
                class="py-2 px-4" 
                wire:click="aceptarSearchModelo" 
                wire:loading.attr="disabled" 
                wire:target="aceptarSearchModelo">
                Aceptar
            </x-button>
            <x-jet-secondary-button 
                class="py-2 px-4"
                wire:click="cancelSearchModelo" 
                wire:loading.attr="disabled"
                wire:target="cancelSearchModelo">
                Cancelar
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="confirmingSearchModeloConStock">
        <x-slot name="title">
            <div class="grid grid-cols-4">
                <div class="flex items-center col-span-3">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Listado de Productos</h3>
                </div>
                <div class="text-right col-span-1">
                    <x-button 
                        color="red" 
                        wire:click="searchModeloConStock" 
                        wire:loading.attr="disabled" 
                        wire:target="searchModeloConStock">
                        <i class="fas fa-sync-alt" aria-hidden="true"></i>
                    </x-button>
                </div>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="border">
                <div class="p-4 border-b">
                    <div class="flex items-center mb-2">
                        <x-jet-label class="mr-4" value="Modelo" />
                        <x-jet-input type="text"
                            wire:model="search_modeloConStock"
                            class="w-full"
                            placeholder="Ingrese el nombre del Modelo que quiere buscar" />
                    </div>
                    <div class="flex items-center">
                        <x-jet-label class="mr-4" value="Color" />
                        <x-jet-input type="text"
                            wire:model="search_colorConStock"
                            class="w-full"
                            placeholder="Ingrese el nombre del Color que quiere buscar" />
                    </div>
                </div>
                <div>
                    <x-table-responsive>
                        @if (count($searchItemsConStock))
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-red-600">
                                    <tr>
                                        <th></th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Modelo
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Color
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Talla
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Precio
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Stock
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($searchItemsConStock as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                                <input type="checkbox" value="{{$item->id}}" wire:model.defer="selectedSearchModeloConStock"
                                                    class="focus:ring-red-500 h-4 w-4 text-red-600 border-gray-300 rounded">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                {{$item->modelo_name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                {{$item->color_name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                {{$item->talla_name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                                S/ {{number_format($item->price,2,'.',',')}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                                {{number_format($item->stock,0,'.',',')}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-4">
                                No hay ningún registro coincidente
                            </div>
                        @endif
                    </x-table-responsive>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button 
                color="red" 
                class="py-2 px-4" 
                wire:click="aceptarSearchModeloConStock" 
                wire:loading.attr="disabled" 
                wire:target="aceptarSearchModeloConStock">
                Aceptar
            </x-button>
            <x-jet-secondary-button 
                class="py-2 px-4"
                wire:click="cancelSearchModeloConStock" 
                wire:loading.attr="disabled"
                wire:target="cancelSearchModeloConStock">
                Cancelar
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
