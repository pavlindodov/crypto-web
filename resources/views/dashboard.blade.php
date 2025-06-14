@section('title', 'CryptoWeb | Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-crypto-list :cryptos="$cryptos" :show-favorites="$showFavorites" />
</x-app-layout>
