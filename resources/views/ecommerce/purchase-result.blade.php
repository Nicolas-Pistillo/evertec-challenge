@extends('layouts.ecommerce')

@section('title', 'Resultado de compra')

@section('content')

    @php
        $background = 'bg-gray-500';
        $textColor = 'text-gray-500';

        switch ($purchase->status) 
        {
            case 'APPROVED': 
                $background = 'bg-green-500';
                $textColor = 'text-green-500';
            break;

            case 'PENDING':  
                $background = 'bg-orange-500';
                $textColor = 'text-orange-500';
            break;

            case 'REJECTED':
                $background = 'bg-red-500';
                $textColor = 'text-red-500';
            break;
        }
    @endphp

    <section class="mt-16 flex-center">

        <div class="relative w-3/4 lg:w-1/2 mx-auto bg-white transition-shadow 
        duration-300 shadow-md hover:shadow-2xl rounded-md">

            <div class="{{ $background }} absolute top-0 left-0 z-0 w-full 
            h-12 rounded-t-md"></div>

            <img src="{{ $purchase->product()->image }}" alt="Product img"
            class="w-20 h-20 object-contain mx-auto rounded-full -mt-14 
            bg-white relative mb-10 p-2 shadow-lg">

            <h2 class="text-center mt-2 text-3xl font-medium">
                {{ $purchase->product()->name }}
            </h2>

            <div class="text-center my-2 font-semibold text-gray-700 text-sm">
                Orden #{{ $purchase->order->reference }}
            </div>

            <h2 class=" {{ $textColor }} text-center font-semibold text-lg">
                {{ $purchase->status }}
            </h2>

            <p class="px-6 text-center mt-2 font-light text-sm">
                {{ $purchase->message }}
            </p>

            <hr class="my-4 border-2 bg-gray-500">

            <h4 class="text-center font-semibold text-gray-700 mb-3">
                Datos del comprador
            </h4>

            <div class="flex-between flex-wrap px-6 mb-3">

                <div class="m-2">
                    <span class="text-gray-700 font-semibold text-sm">Nombre:</span> 
                    <br> 
                    {{ $purchase->order->customer_name }}
                </div>

                <div class="m-2">
                    <span class="text-gray-700 font-semibold text-sm">Email:</span> 
                    <br> 
                    {{ $purchase->order->customer_email }}
                </div>

                <div class="m-2">
                    <span class="text-gray-700 font-semibold text-sm">Telefono:</span> 
                    <br> 
                    {{ $purchase->order->customer_mobile }}
                </div>

            </div>

        </div>

    </section>

    <div class="text-center mt-6 w-3/4 lg:w-1/2 mx-auto">

        <a href="{{ route('ecommerce.index') }}" 
        class="btn-primary">Volver al inicio</a>

    </div>

@endsection