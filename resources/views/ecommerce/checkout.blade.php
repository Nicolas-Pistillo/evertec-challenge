@extends('layouts.ecommerce')

@section('content')
    
  @if ($errors->any())
      
    <div class="p-4 text-white bg-red-600 rounded-md mb-6 flex items-center 
    shadow-lg font-medium">
        <i class="material-icons mr-3">error</i> Ocurrio un error al procesar la compra,
        por favor verifique que todos los campos sean correctos
    </div>

  @endif

  <div class="md:flex items-start justify-center max-w-4xl mx-auto py-8 px-6 bg-white
  shadow-md transition-shadow duration-300 hover:shadow-xl rounded-md mb-8
  animate__animated animate__backInRight">

      <img src="{{ $product->image }}" class="w-60 h-60 m-auto object-contain" 
      alt="Product img">

      <div class="pl-3 md:w-1/2 md:pl-8 lg:ml-8 md:ml-6 md:mt-0 mt-6 border-l-2">

          <div class="border-gray-200 pb-3">

              <p class="text-sm font-semibold leading-none text-gray-500 capitalize">
                  {{ $product->category }}
              </p>

              <h2 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 
              text-gray-800 dark:text-white my-2">
                  {{ $product->name }}
              </h2>
              
              <p class="text-sm leading-none text-gray-600 mb-2">
                {{ $product->description }}
              </p>

          </div>

          <div class="py-3">
            
            <p class="text-sm text-gray-500 leading-none font-semibold mb-8">
              Datos del cliente
            </p>

            <form method="POST" action="{{ route('ecommerce.pay', $product) }}" 
            x-data="{ submited: false }" @submit="submited = true">

              @csrf

              <div class="flex-between mb-6">

                <x-floating-input class="mr-3" name="customer_name" label="Nombre" />

                <x-floating-input type="number" name="customer_mobile" label="Telefono" />

              </div>

              <div class="relative z-0 mb-6 w-full group">

                <x-floating-input name="customer_email" label="Email" />

              </div>

              <button type="submit" :disabled="submited"
              class="w-full text-base" :class="submited ? 'btn-disabled' : 'btn-green'"
              x-text="submited ? 'Espere...' : 'Comprar'">
              </button>
      
            </form>
            
          </div>

      </div>

  </div>

  <div class="flex-center">
      <a href="{{ route('ecommerce.index') }}" class="btn-secondary">
          <i class="material-icons mr-2">arrow_back</i> Volver al cat??logo
      </a>
  </div>

@endsection