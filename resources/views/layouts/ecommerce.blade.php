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
    @yield('head')
    <title>Evertec Challenge</title>
</head>
<body class="bg-gray-200">
   
    <header class="fixed w-full h-16 bg-white shadow-lg py-2 px-6 flex-between z-20">

        <div class="flex-center">

            <a href="{{ route('ecommerce.index') }}" class="flex-center mr-8"
            title="Ir a inicio">

                <img src="{{ asset('img/logo-test.png') }}" alt="img logo"
                class="w-12 h-12 rounded-full mr-2">
    
                <h4 class="text-lg font-semibold">Ecommerce</h4>
    
            </a>

            <a href="#" class="btn-primary">Mis compras</a>

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

    <main class="px-6 pt-24">
        @yield('content')
    </main>

    <div x-data="{ open: false }"> 

        <div x-show="open"
            x-transition:enter-start="opacity-0 translate-y-8"
            x-transition:enter="transition duration-300 transform ease"
            x-transition:leave="transition duration-300 transform ease"
            x-transition:leave-end="opacity-0 translate-y-5"
            @click.away="open = false"
            class="fixed flex flex-col z-50 bottom-[100px] top-5
            right-5 h-[calc(100& - 20px)] w-[350px] 
            overflow-auto border border-gray-300 bg-white shadow-2xl rounded-lg">

                <div class="flex px-4 py-6 flex-col-center bg-indigo-600">
                    <h3 class="text-lg text-white">Iniciar sesión o registrarse</h3>
                    <p class="text-white opacity-50">Para ver tus compras</p>
                </div>

                <div class="bg-gray-50 flex-grow p-6"> 
                
                    <form action="" method="POST" class="needs-validation" novalidate>
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                        </div>
                
                    </form>

                </div>

        </div>

        <button @click="open = !open" class="fixed z-40 right-5 bottom-5 shadow-lg 
        flex justify-center items-center w-14 h-14 bg-indigo-500 rounded-full 
        focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 transition 
        duration-300 ease">
            <svg
              class="w-6 h-6 text-white absolute"
              x-show="!open"
              x-transition:enter-start="opacity-0 -rotate-45 scale-75"
              x-transition:enter="transition duration-200 transform ease"
              x-transition:leave="transition duration-100 transform ease"
              x-transition:leave-end="opacity-0 -rotate-45"
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path
                d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
              ></path>
            </svg>
    
            <svg
              class="w-6 h-6 text-white absolute"
              x-show="open"
              x-transition:enter-start="opacity-0 rotate-45 scale-75"
              x-transition:enter="transition duration-200 transform ease"
              x-transition:leave="transition duration-100 transform ease"
              x-transition:leave-end="opacity-0 rotate-45"
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        
    </div>

    @yield('scripts')
</body>
</html>