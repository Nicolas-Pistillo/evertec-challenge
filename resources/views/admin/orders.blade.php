@extends('layouts.base')

@section('content')
    
<header class="fixed w-full h-16 bg-white shadow-lg py-2 px-6 flex-between z-20">

    <div class="flex-center">

        <a href="{{ route('admin.orders') }}" class="flex-center mr-8"
        title="Ir a inicio">

            <img src="{{ asset('img/logo-test.png') }}" alt="img logo"
            class="w-12 h-12 rounded-full mr-2">

            <h4 class="text-lg font-semibold">Ecommerce | Dashboard</h4>

        </a>

    </div>

    <div class="flex-center">

        <a href="{{ route('ecommerce.index') }}" class="btn-primary" target="_blank">
            Ir a la tienda <i class="material-icons ml-2">store</i>
        </a>

        <a href="{{ route('admin.logout') }}" class="btn-red ml-3">
            Cerrar sesion <i class="material-icons ml-2">logout</i>
        </a>

    </div>

</header>

<div class="overflow-x-auto pt-24">

    <h2 class="ml-5 text-xl font-semibold text-gray-700 text-center">
        Ordenes de la tienda
    </h2>

    <div class="flex-center overflow-hidden">

        @if ($orders->isEmpty())
            
            <div class="mt-8 flex-col-center">

                <img src="{{ asset('img/transaction.svg') }}" alt="Img transaction"
                class="w-80 h-80">

                <p class="text-gray-700 font-semibold">
                    Hmm...parece que aún no se han hecho ventas en la
                    <a href="{{ route('ecommerce.index') }}" target="_blank"
                    class="text-blue-600 underline">
                        tienda
                    </a>
                </p>

            </div>

        @else
            <div class="w-full lg:w-5/6">
                <div class="shadow-xl rounded-lg my-6 mx-3">

                    <table class="min-w-max w-full table-auto rounded-md">

                        <thead>
                            <tr class="bg-blue-500 text-white uppercase text-sm 
                            leading-normal">
                                <th class="py-3 px-6 text-center">ID</th>
                                <th class="py-3 px-6 text-center">Referencia</th>
                                <th class="py-3 px-6 text-center">Producto</th>
                                <th class="py-3 px-6 text-center">Cliente</th>
                                <th class="py-3 px-6 text-center">Estado</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm font-light">

                            @foreach ($orders as $order)
                                
                                <tr class="border-b border-gray-200 
                                hover:bg-gray-100">

                                    <td class="py-3 px-6 text-center">
                                        {{ $order->id }}
                                    </td>

                                    <td class="py-3 px-6 text-center">
                                        #{{ $order->reference }}
                                    </td>

                                    <td class="py-3 px-6 text-center">
                                        <div class="flex-center">

                                            <img src="{{ $order->product->image }}" 
                                            class="w-8 h-8 object-contain mr-3">

                                            <div>

                                                <h5 class="font-semibold">
                                                    {{ $order->product->name }}
                                                </h5>

                                                <p class="text-xs">
                                                    {{ $order->product->category }}
                                                </p>

                                            </div>

                                        </div>
                                    </td>

                                    <td class="py-3 px-6 text-center">

                                        <h5 class="font-semibold">
                                            {{ $order->customer_name }}
                                        </h5>

                                        <p class="text-xs">
                                            {{ $order->customer_email }}
                                        </p>

                                    </td>

                                    <td class="py-3 px-6 text-center font-semibold">
                                        {{ $order->status }}
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>            
        @endif

    </div>
</div>

@endsection