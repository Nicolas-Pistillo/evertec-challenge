<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
    <title>Mi Ecommerce</title>
</head>
<body class="bg-gray-100">
   
    <header class="fixed w-full h-16 bg-white shadow-lg py-2 px-6 flex-between">

        <div class="flex-center">

            <img src="{{ asset('img/logo-test.png') }}" alt="img logo"
            class="w-12 h-12 rounded-full mr-4">

            <h4 class="text-lg font-semibold">Mi Ecommerce</h4>

        </div>

        <small>By 
            <a href="https://www.linkedin.com/in/nicolas-pistillo/" target="_blank"
            class="text-blue-800 hover:underline">
                Nicolas Pistillo
            </a>
        </small>

    </header>

    <main class="px-6 pt-24">
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>