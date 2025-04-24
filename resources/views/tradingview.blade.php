@section('title', 'CryptoWeb | ' . strtoupper($symbol) . ' Chart')

<x-app-layout class="overflow-hidden">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ strtoupper($symbol) . ' Chart' }}
        </h2>
    </x-slot>

    <div class="w-full h-screen overflow-hidden flex justify-center mt-0 div-exclude">
        <div class="tradingview-widget-container w-full max-w-7xl my-12">
            <div id="tradingview-widget" class="w-full h-full div-exclude bg-gray-900"></div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const symbol = @json($symbol);

                window.loadTradingViewScript(function() {
                    window.createTradingViewWidget(symbol);
                });

                window.addEventListener('themeChanged', function() {
                    window.createTradingViewWidget(symbol);
                });

                document.getElementById('theme-toggle-btn').addEventListener('click', function() {
                    let theme = localStorage.getItem('theme') === 'light' ? 'dark' : 'light';
                    localStorage.setItem('theme', theme);
                    window.dispatchEvent(new Event('themeChanged'));
                });
            });
        </script>
    @endpush

</x-app-layout>
