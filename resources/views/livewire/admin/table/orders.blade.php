<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mesas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex mx-auto flex-col md:flex-row max-w-7xl sm:px-6 lg:px-8">
            <div class="w-full md:w-1/4 p-4 bg-gray-100 rounded-lg shadow-md">
                <h3 class="mb-4 text-lg font-semibold">Mesas</h3>
                <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
                    @foreach ($tables as $table)
                        <div class="py-4 px-5 transition duration-300 rounded-lg shadow-md cursor-pointer hover:bg-gray-200"
                            wire:click="selectTable({{ $table->id }})"
                            :class="{ 'bg-green-100': {{ $table->status == 'occupied' }} }">
                            <div class="flex flex-col items-center justify-center">
                                <span class="font-medium">Mesa #{{ $table->id }}</span>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full animate-pulse"
                                        :class="{ 'bg-red-500': {{ $table->status == 'occupied' }}, 'bg-green-500': {{ $table->status != 'occupied' }} }">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="w-full md:w-3/4 p-6 mx-2 bg-white rounded-lg shadow-md" wire:loading.remove>
                @if ($selectedTable)
                    @if ($selectedTable->status == 'occupied')
                        <h3 class="mb-4 text-xl font-bold">Detalhes da Mesa #{{ $selectedTable->id }}</h3>

                        @php
                            $groupedOrders = $selectedTable->orders->groupBy('name');
                        @endphp

                        @foreach ($groupedOrders as $personName => $orders)
                            @php
                                $totalAmount = $orders->sum('total_price');
                                $allItems = $orders
                                    ->flatMap(fn($order) => $order->items)
                                    ->map(fn($item) => $item->menuItem->name . ' x ' . $item->quantity)
                                    ->toArray();

                            @endphp

                            <div class="py-4 border-b">
                                <p class="text-lg font-semibold">{{ $personName }} - R$
                                    {{ number_format($totalAmount, 2, ',', '.') }}</p>
                                <p class="text-sm text-gray-600">Itens: {{ implode(', ', $allItems) }}</p>

                                @if ($orders->every(fn($order) => $order->status === 'paid'))
                                    <span class="text-green-500 font-semibold">Pago</span>
                                @else
                                    <button wire:click="payPerson('{{ $personName }}', {{ $selectedTable->id }})"
                                        class="px-4 py-2 mt-2 text-white bg-green-500 rounded-md hover:bg-green-600">
                                        Pagar
                                    </button>
                                @endif
                            </div>
                        @endforeach


                        <div class="p-4 bg-white rounded-lg shadow-md">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-lg font-semibold">Total da Mesa: </span>
                                <span class="text-xl font-bold text-gray-800">R$
                                    {{ number_format($selectedTable->orders->where('status', '!=', 'paid')->sum('total_price'), 2, ',', '.') }}
                                </span>
                            </div>


                            <button wire:click="finalizeTable({{ $selectedTable->id }})"
                                class="w-full px-6 py-3 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                Finalizar Conta da Mesa
                            </button>
                        </div>
                    @else
                        <p class="text-lg text-gray-600">Esta mesa está livre.</p>
                    @endif
                @else
                    <p class="text-lg text-gray-600">Selecione uma mesa para ver os detalhes.</p>
                @endif
            </div>
        </div>

    </div>
</div>
