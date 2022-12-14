<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="shortcut icon" href="{{ asset('img/logo-test.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('head')
    <title>@yield('title', 'Evertec Challenge')</title>
</head>
<body class="bg-gray-200 relative">
   
    <header class="fixed w-full h-16 bg-white shadow-lg py-2 px-6 flex-between z-20">

        <div class="flex-center">

            <a href="{{ route('ecommerce.index') }}" class="flex-center mr-8"
            title="Ir a inicio">

                <img src="{{ asset('img/logo-test.png') }}" alt="img logo"
                class="w-12 h-12 rounded-full mr-2">
    
                <h4 class="text-lg font-semibold">Ecommerce</h4>
    
            </a>

        </div>

        <div class="flex-center">

            <small class="mr-3">By 
                <a href="https://www.linkedin.com/in/nicolas-pistillo/" target="_blank"
                class="text-blue-800 hover:underline">
                    Nicolas Pistillo
                </a>
            </small>

            <img src="{{ asset('img/argentina.png') }}" class="w-6 h-6">

        </div>

    </header>

    <main class="px-6 py-24 overflow-hidden">

        @yield('content')
        
    </main>

    @yield('scripts')
    
    @livewireScripts

    <div x-data="{ open: false }" class="hidden" id="widget">

        <div x-show="open"
        x-transition:enter-start="opacity-0 translate-y-8"
        x-transition:enter="transition duration-300 transform ease"
        x-transition:leave="transition duration-300 transform ease"
        x-transition:leave-end="opacity-0 translate-y-5"
        @click.away="open = false"
        class="fixed flex flex-col z-50 bottom-[100px] top-5
        right-5 h-[calc(100& - 20px)] w-[380px] overflow-auto border 
        border-gray-300 bg-white shadow-2xl rounded-lg">
    
            <div class="flex px-4 py-6 flex-col-center bg-blue-600">
                <h3 class="text-lg text-white font-semibold">
                    ??Bienvenido a mi Ecommerce!
                </h3>
            </div>
    
            <div class="bg-gray-50 flex-grow"> 
                
                @livewire('orders')
    
            </div>
    
        </div>
    
        <button @click="open = !open" class="fixed z-40 right-5 bottom-5 shadow-lg 
        flex justify-center items-center w-14 h-14 bg-blue-500 rounded-full 
        focus:outline-none hover:bg-blue-600 transition duration-300 ease">

            <i class="material-icons w-6 h-6 text-white absolute"
            x-show="!open"
            x-transition:enter-start="opacity-0 -rotate-45 scale-75"
            x-transition:enter="transition duration-200 transform ease"
            x-transition:leave="transition duration-100 transform ease"
            x-transition:leave-end="opacity-0 -rotate-45">
                local_mall
            </i>
    
            <i class="material-icons w-6 h-6 text-white absolute"
            x-show="open"
            x-transition:enter-start="opacity-0 rotate-45 scale-75"
            x-transition:enter="transition duration-200 transform ease"
            x-transition:leave="transition duration-100 transform ease"
            x-transition:leave-end="opacity-0 rotate-45">
                close
            </i>

        </button>
        
    </div>

    <script>
        document.addEventListener('livewire:load', function () {

            let widget = document.getElementById('widget')
            
            setTimeout(() => widget.classList.remove('hidden'), 1000);

        })
    </script>

</body>
</html>