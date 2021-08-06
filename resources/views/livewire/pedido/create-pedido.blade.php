<div class="container py-6">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-3 border-b bg-gray-100 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Pedido</h3>
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
                </div>
                <div class="text-right">

                </div>
            </div>
            <div class="border">
                <x-table-responsive>
                    @if (count($items))
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Id
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Modelo - Color
                                    </th>
                                    <th scope="col" class="p-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Precio
                                    </th>
                                    <th scope="col" class="p-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Importe
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="p-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$item->id}}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$item->name}}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-right text-sm text-gray-500">
                                            {{number_format($item->qty,0,'.',',')}}
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
                                            S/ {{number_format($item->price * $item->qty,2,'.',',')}}
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
    
                </x-table-responsive>
            </div>
        </div>
        <div class="px-4 py-3 border-t bg-gray-50 sm:px-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <x-jet-label value="Comentario" />
                <textarea class="w-full form-control" rows="4"
                    wire:model="comment"
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
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th></th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Modelo
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Color
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
</div>
