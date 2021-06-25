<nav x-data="{ open: false }" class="bg-gray-200 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="container px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-12">
            <div class="flex items-center">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                    <x-jet-dropdown>
                        <x-slot name="trigger">
                            <button type="button" class="text-gray-500 group rounded-md inline-flex items-center text-base hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                                <span>Solutions</span>
                                <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('login') }}">
                                {{ __('Login') }}
                            </x-jet-dropdown-link>
    
                            <x-jet-dropdown-link href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                    <x-jet-nav-link href="" :active="request()->routeIs('/')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                </div>
            </div>
         
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
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
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>
    </div>
</nav>

