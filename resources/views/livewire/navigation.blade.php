<header class="bg-gray-100 sticky top-0" style="z-index: 3" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between md:justify-start">
        <a href="/" class="mx-6">
            <img class="h-auto w-20" src="{{asset('img/logo-dlirio.png')}}" alt="">
        </a>

        <div class="flex-1">
            {{-- <div class="md:hidden">

            </div> --}}
            <div class="hidden md:block">
                @livewire('search')
            </div>
        </div>

        <div class="mx-6 relative block">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        {{-- <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link> --}}

                        <x-jet-dropdown-link href="{{ route('pedidos.create') }}">
                            Nuevo Pedido
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('pedidos.index') }}">
                            Mis Pedidos
                        </x-jet-dropdown-link>

                        {{-- <x-jet-dropdown-link href="{{ route('admin.index') }}">
                            Administrador
                        </x-jet-dropdown-link> --}}

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-black text-3xl cursor-pointer"></i>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('unete.index') }}">
                            Únete a Nosotros
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>

        <div class="block">
            @livewire('dropdown-cart')
        </div>

    </div>
   
    <div x-data="{ open: false }" class="bg-red-600 sticky top-0">
        <!-- Primary Navigation Menu -->
        <div class="container px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-12">
                <div class="flex items-center">
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button type="button" class="text-white group rounded-md inline-flex items-center text-base hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600" aria-expanded="false">
                                    <span>Categorías</span>
                                    <svg class="text-white ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-jet-dropdown-link href="{{route('modelos.index')}}">
                                    Todos
                                </x-jet-dropdown-link>
                                @foreach ($categorias as $categoria)
                                    <x-jet-dropdown-link href="{{route('categorias.show', $categoria)}}">
                                        {{ $categoria->name }}
                                    </x-jet-dropdown-link>
                                @endforeach
                            </x-slot>
                        </x-jet-dropdown>
                        <a href="{{route('catalogs.index')}}" class="text-base font-medium text-white hover:text-gray-500">
                            Catálogos
                        </a>
                        <a href="{{route('unete.index')}}" class="{{request()->routeIs('unete.index') ? 'active' : ''}} text-base font-medium text-white hover:text-gray-500">
                            Únete a Nosotros
                        </a>
                        {{-- <a href="#" class="text-base font-medium text-white hover:text-gray-500">
                            Venta por Catálogo
                        </a> --}}
                        <a href="{{route('contactanos.index')}}" class="{{request()->routeIs('contactanos.index') ? 'active' : ''}} text-base font-medium text-white hover:text-gray-500">
                            Contáctenos
                        </a>
                    </div>
                </div>
             
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-red-500 focus:outline-none focus:bg-red-600 focus:text-white transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            {{-- Menu mobil --}}
            <div class="bg-white h-full overflow-y-auto">
                <div class="container bg-gray-200 py-3 mb-2">
                    @livewire('search')
                </div>
    
                <ul>
                    <li class="text-gray-600 hover:bg-red-600 hover:text-white">
                        <a href="{{route('categorias.index')}}" class="py-2 px-4 text-sm flex items-center">
                            Categorías
                        </a>
                    </li>
                    <li class="text-gray-600 hover:bg-red-600 hover:text-white">
                        <a href="{{route('catalogs.index')}}" class="py-2 px-4 text-sm flex items-center">
                            Catálogos
                        </a>
                    </li>
                    <li class="text-gray-600 hover:bg-red-600 hover:text-white">
                        <a href="{{route('unete.index')}}" class="{{request()->routeIs('unete.index') ? 'active' : ''}} py-2 px-4 text-sm flex items-center">
                            Únete a Nosotros
                        </a>
                    </li>
                    {{-- <li class="text-gray-600 hover:bg-red-600 hover:text-white">
                        <a href="#" class="py-2 px-4 text-sm flex items-center">
                            Venta por Catálogo
                        </a>
                    </li> --}}
                    <li class="text-gray-600 hover:bg-red-600 hover:text-white">
                        <a href="{{route('contactanos.index')}}" class="{{request()->routeIs('contactanos.index') ? 'active' : ''}} py-2 px-4 text-sm flex items-center">
                            Contáctenos
                        </a>
                    </li>
                    {{-- @foreach ($categorias as $categoria)
                        <li class="text-gray-600 hover:bg-red-600 hover:text-white">
                            <a href="{{route('categorias.show', $categoria)}}" class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $categoria->icon !!}
                                </span>
                                {{ $categoria->name }}
                            </a>
                        </li>
                    @endforeach --}}
                </ul>
            </div>
        </div>
    </div>
    
</header>
