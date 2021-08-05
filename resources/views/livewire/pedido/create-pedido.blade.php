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
        <div class="px-4 py-5 bg-white sm:p-6">
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
              <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envíos</p>
  
              <label class="bg-white rounded-lg shadow px-4 py-4 flex items-center mb-4">
                  <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-gray-600">
                  <span class="ml-2 text-gray-700">
                      Recojo en tienda
                  </span>
                  <span class="font-semibold text-gray-700 ml-auto">
                      Gratis
                  </span>
              </label>
  
              <div class="bg-white rounded-lg shadow">
                  <label class="px-4 py-4 flex items-center">
                      <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-gray-600">
                      <span class="ml-2 text-gray-700">
                          Envío a domicilio
                      </span>
                  </label>
  
                  <div class="px-4 pb-4 grid grid-cols-2 gap-4 hidden" :class="{ 'hidden': envio_type != 2 }">
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

            <div>
              <ul>
                @forelse ($items as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                        <article class="flex-1">
                            <h1 class="font-bold">{{$item->name}}</h1>

                            <div class="flex">
                                @isset($item->options['color'])
                                    <p class="text-sm">{{$item->options['color']}}</p>
                                @endisset

                                @isset($item->options['talla'])
                                    <p class="text-sm">,</p>
                                    <p class="text-sm ml-2">{{$item->options['talla']}}</p>
                                @endisset

                            </div>
                            
                            <div class="flex">
                                <p>{{$item->qty}}</p>
                                <p class="mx-2">x</p>
                                <p>S/ {{number_format($item->price,2,'.',',')}}</p>
                            </div>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
              </ul>
            </div>
        </div>
        <div class="px-4 py-3 border-t bg-gray-50 sm:px-6">
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
