@extends('layouts.base')

@section('content')
    
    <div class="bg-gray-50 dark:bg-gray-900">
        <div class="flex justify-center h-screen">

            <div class="hidden bg-cover bg-center lg:block lg:w-1/2 shadow-2xl" 
            style="background-image: url({{ asset('img/ecommerce-banner.jpg') }})">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div class="animate__animated animate__fadeInDown text-white">

                        <h2 class="text-4xl font-bold">Administrador</h2>
                        
                        <p class="max-w-xl mt-3">
                            Gestiona el estado y las ventas de tu tienda en linea
                            en un solo panel
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">

                    <div class="text-center">

                        <img src="{{ asset('img/logo-test.png') }}" alt="Img logo"
                        class="mb-3 w-16 h-16 mx-auto">
                        
                        <p class="mt-3 text-gray-700 dark:text-gray-300">
                            Ingresa con tus credenciales
                        </p>

                    </div>

                    <div class="mt-3">

                        <form action="{{ route('admin.login') }}" method="POST" 
                        class="overflow-hidden">

                            @csrf

                            <x-floating-input class="my-5" name="email" label="Email" />

                            <x-floating-input class="mb-5" name="password" label="Contraseña" />

                            @if ($errors->any())
                                <small class="text-red-500 block animate__animated 
                                animate__slideInLeft">
                                    Credenciales incorrectas
                                </small>
                            @endif

                            <button type="submit" class="btn-primary w-full mt-3">
                                Iniciar sesion
                            </button>

                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
