@extends('layouts.ecommerce')

@section('title', 'Resultado de compra')

@section('content')

<section class="mt-20 flex-center">

    <div class="relative w-3/4 lg:w-1/2 mx-auto bg-white transition-shadow duration-300 
    shadow-md hover:shadow-2xl rounded-md">

        <div class="absolute top-0 left-0 z-0 w-full h-12 bg-green-400 rounded-t-md">
        </div>

        <img src="{{ $purchase->product()->image }}" alt="Product img"
        class="w-28 h-28 object-contain mx-auto rounded-full -mt-20 
        bg-white relative mb-6">

        <h2 class="text-center mt-2 text-3xl font-medium">
            {{ $purchase->product()->name }}
        </h2>

        <div class="text-center my-2 font-light text-sm">
            Order #{{ $purchase->order->reference }}
        </div>

        <div class="text-center font-normal text-lg text-indigo-600">
            {{ $purchase->status }}
        </div>

        <p class="px-6 text-center mt-2 font-light text-sm">
           {{ $purchase->product()->description }}
        </p>

       <hr class="mt-8">
       <div class="flex p-4">
         <div class="w-1/2 text-center">
           <span class="font-bold">1.8 k</span> Followers
         </div>
         <div class="w-0 border border-gray-300">
           
         </div>
         <div class="w-1/2 text-center">
           <span class="font-bold">2.0 k</span> Following
         </div>
       </div>
    </div>

</section>

{{-- 
 <div class="relative max-w-md mx-auto md:max-w-2xl min-w-0 break-words 
    bg-white w-full mb-6 shadow-lg rounded-xl mt-16">
        <div>
            <div class="flex flex-wrap justify-center">
                <div class="w-full flex justify-center">
                    <div class="relative">
                        <img src="{{ $purchase->product()->image }}" 
                        class="rounded-full object-contain border-none 
                        absolute -m-16 ml-16 max-w-[150px]"/>
                    </div>
                </div>
                <div class="w-full text-center mt-20">
                    <div class="flex justify-center lg:pt-4 pt-8 pb-0">
                        <div class="p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-slate-700">3,360</span>
                            <span class="text-sm text-slate-400">Photos</span>
                        </div>
                        <div class="p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-slate-700">2,454</span>
                            <span class="text-sm text-slate-400">Followers</span>
                        </div>

                        <div class="p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-slate-700">564</span>
                            <span class="text-sm text-slate-400">Following</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-2">
                <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">Mike Thompson</h3>
                <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                    <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>Paris, France
                </div>
            </div>
            <div class="mt-6 py-6 border-t border-slate-200 text-center">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4">
                        <p class="font-light leading-relaxed text-slate-600 mb-4">An artist of considerable range, Mike is the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and records all of his own music, giving it a warm.</p>
                        <a href="javascript:;" class="font-normal text-slate-700 hover:text-slate-400">Follow Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

--}}


@endsection