@section('title', 'CryptoWeb | ' . strtoupper($symbol) . ' Chart')
<x-app-layout class="overflow-hidden">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(strtoupper($symbol) . ' Chart') }}
        </h2>
    </x-slot>

    <div class="w-full h-screen overflow-hidden flex justify-center mt-0 div-exclude">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container w-full max-w-7xl h-[90vh] my-12">
            <div class="tradingview-widget-container__widget w-full h-full div-exclude bg-gray-900"></div>
            <div class="tradingview-widget-copyright text-center text-gray-400 div-exclude bg-gray-900">
                <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank">
                    <span class="blue-text">Track all markets on TradingView</span>
                </a>
            </div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
            {
                "autosize": true,
                "symbol": "{{ $symbol }}USD",
                "interval": "60",
                "timezone": "Etc/UTC",
                "theme": "dark",
                "style": "1",
                "locale": "en",
                "allow_symbol_change": true,
                "support_host": "https://www.tradingview.com"
            }
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
</x-app-layout>
