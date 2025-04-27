@section('title', 'CryptoWeb | Dashboard')
@vite(['resources/css/scroll-to-top.css', 'resources/js/scroll-to-top.js'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-crypto-list :topCryptos="$topCryptos" />
</x-app-layout>
<!-- Botón para ir arriba -->
<button id="button-up">
    ↑
</button>
