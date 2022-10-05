<div>
    
    @forelse ($purchases as $purchase)
        
        <div class="h-16 flex-between transition-shadow duration-300
        hover:shadow-lg">

            <div class="h-full flex items-center px-2">

                <img src="{{ $purchase->product()->image }}" alt="Product img"
                class="w-14 h-10 mr-3 object-contain">

                <div class="flex-col-center">

                    <h4 class="font-semibold">{{ $purchase->product()->name }}</h4>

                    <small class="capitalize text-xs text-gray-600">
                        {{ $purchase->product()->category }}
                    </small>
                </div>

            </div>

            <div class="h-full flex-col-center px-2">

                <h4 class="font-semibold text-indigo-600">
                    {{ $purchase->order->status }}
                </h4>

                <small class="capitalize text-xs text-gray-600">
                    {{ $purchase->updated_at->format('d/m/Y H:i:s') }}
                </small>

            </div>

        </div>

    @empty
        NO HAY TRANSACCIONES
    @endforelse

</div>
