<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TradingView Widget') }}
        </h2>
    </x-slot>

    <div class="w-full h-screen">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container w-full h-full">
            <div class="tradingview-widget-container__widget w-full h-full"></div>
            <div class="tradingview-widget-copyright">
                <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank">
                    <span class="blue-text">Track all markets on TradingView</span>
                </a>
            </div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
            {
                "autosize": true,
                "symbol": "{{ $symbol }}USD",
                "interval": "D",
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
