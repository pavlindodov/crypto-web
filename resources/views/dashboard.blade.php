<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($topCryptos as $crypto)
                        <div class="p-4 border rounded-lg shadow-lg">
                            <img src="{{ $crypto['image'] }}" alt="{{ $crypto['name'] }} logo" class="w-16 h-16 mx-auto mb-4">
                            <h3 class="font-bold text-lg text-center">{{ $crypto['name'] }}</h3>
                            <p class="text-center text-gray-700">Price: ${{ number_format($crypto['current_price'], 2) }}</p>
                            <p class="text-center text-gray-500">24h: {{ number_format($crypto['price_change_percentage_24h'], 2) }}%</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
