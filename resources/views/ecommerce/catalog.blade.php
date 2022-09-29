@extends('layouts.ecommerce')

@section('content')

    <h2 class="text-center text-xl font-semibold mb-8" style="letter-spacing: 2px">
        Productos
    </h2>

    <section class="products flex-center flex-wrap px-8 animate__animated 
    animate__fadeIn">

        @foreach ($products as $product)

        <div class="w-80 shadow-md transition duration-500 hover:shadow-2xl 
        m-4 bg-white rounded-lg overflow-hidden hover:scale-105 ease-out">

            <img src="{{ $product->image }}" alt="Foto Prueba"
            class="w-full h-40 object-contain py-3 border-b-2">

            <div class="flex h-52 flex-col justify-between items-center">

                <div class="pt-6 px-3">

                    <h4 class="font-semibold mb-1">{{ $product->name }}</h4>

                    <div class="flex-between mb-3">

                        <b class="text-green-600">${{ round($product->price, 2) }}</b>

                        <span class="py-1 px-3 text-sm bg-indigo-500 rounded-full 
                        font-extralight text-white">
                            {{ $product->category }}
                        </span>

                    </div>

                    <p class="font-light text-sm pb-2">{{ $product->description }}</p>

                </div>

                <a href="{{ route('ecommerce.checkout', $product->id) }}" 
                class="block w-full py-2 px-4 rounded-b-lg text-center
                text-white transition duration-300 font-semibold
                bg-blue-500 hover:bg-blue-600">
                    Iniciar compra
                </a>

            </div>

        </div>

        @endforeach

    </section>

@endsection