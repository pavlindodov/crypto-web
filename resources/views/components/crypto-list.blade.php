@props(['topCryptos'])

<div class="div-exclude py-12">
    <div class="div-exclude max-w-7xl mx-auto m sm:px-6 lg:px-8">
        @if(count($topCryptos) === 0 || is_null($topCryptos))
            <div class="div-exclude max-w-7xl mx-auto py-8">
                <div class="bg-white rounded-lg shadow-md p-6 text-center text-gray-500">
                    No cryptocurrencies available at the moment. Please check back later.
                </div>
            </div>
        @else
            <div class="list-container overflow-hidden shadow-xl sm:rounded-lg bg-white p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($topCryptos as $crypto)
                        <a href="{{ route('tradingview', ['symbol' => $crypto['symbol']]) }}" class="block">
                            <div class="box p-4 border rounded-lg shadow-lg hover:transform hover:scale-105 transition-all duration-200">
                                <img src="{{ $crypto['image'] }}"
                                    alt="{{ $crypto['name'] }} logo"
                                    class="w-16 h-16 mx-auto mb-4 object-contain"
                                    loading="lazy">
                                <h3 class="font-overflow font-bold text-lg text-center truncate">
                                    {{ $crypto['name'] }}
                                </h3>
                                <p class="text-center text-gray-700">
                                    ${{ number_format($crypto['current_price'], 2) }}
                                </p>
                                <p class="text-center {{ $crypto['price_change_percentage_24h'] >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                    {{ number_format($crypto['price_change_percentage_24h'], 2) }}%
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
