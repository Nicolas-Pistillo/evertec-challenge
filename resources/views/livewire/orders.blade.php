<div>
    
    @if ($purchases->isNotEmpty())
        
        <div class="my-2 mx-4">
            <button wire:click='clearOrders'
            class="h-10 py-2 px-4 rounded-md flex-center transition-colors 
            duration-300 text-white bg-red-500 hover:bg-red-600 text-sm">
                Eliminar historial
                <i class="material-icons ml-2">delete</i>
            </button>
        </div>

    @endif

    @forelse ($purchases as $purchase)
        
        <div class="h-16 flex-between transition-shadow duration-300
        hover:shadow-xl text-center" wire:key='{{ $purchase->id }}'>

            <div class="h-full flex items-center px-2">

                <img src="{{ $purchase->product()->image }}" alt="Product img"
                class="w-14 h-10 mr-3 object-contain">

                <div class="flex-col-center">

                    <h4 class="font-semibold">{{ $purchase->product()->name }}</h4>

                    <small class="capitalize text-xs font-semibold text-gray-600">
                        #{{ $purchase->order->reference }}
                    </small>
                </div>

            </div>

            <div class="h-full flex-col-center px-2">

                <div class="flex-center">

                    <h4 class="font-semibold text-indigo-600 text-sm">
                        {{ $purchase->order->status }}
                    </h4>

                    @if ($purchase->status === 'PENDING')
                        
                        <a href="{{ $purchase->process_url }}" style="font-size: 20px"
                        target="_blank" title="Finalizar compra" 
                        wire:click="reOpenCheckout({{ $purchase }})"
                        class="material-icons ml-2 p-2 bg-gray-300 rounded-full
                        transition-colors duration-300 hover:bg-indigo-600 
                        hover:text-white">
                            open_in_new
                        </a>

                    @endif

                </div>

                <small class="capitalize text-xs text-gray-600">
                    {{ $purchase->updated_at->format('d/m/Y H:i:s') }}
                </small>

            </div>

        </div>

    @empty
            
        <div class="text-center mt-10 p-4">

            <img src="{{ asset('img/empty-cart.svg') }}" 
            class="w-48 h-48 mx-auto mb-6">

            <h4 class="font-semibold text-gray-700">
                Aqui veras el estado de todas tus compras
            </h4>

        </div>

    @endforelse

</div>
