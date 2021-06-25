<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- Fontawesome --}}
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        {{-- FlexSlid --}}
        <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">

        <!-- Glider -->
        <link rel="stylesheet" href="{{ asset('vendor/Glider/css/glider.css') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
        @livewireStyles

        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        {{-- FlexSlid --}}
        <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>

        <!-- Glider -->
        <script src="{{ asset('vendor/Glider/js/glider.min.js') }}"></script>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-50">
            @livewire('navigation')
            @livewire('navigation-option')
                        
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script>
            function dropdown() {
                return {
                    open: false,
                    show(){
                        if (this.open) {
                            this.open = false;
                            document.getElementsByTagName('html')[0].style.overflow = 'auto'
                        } else {
                            this.open = true;
                            document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                        }
                    },
                    close(){
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    }
                }
            }
        </script>

        @stack('script')
        
    </body>
</html>
