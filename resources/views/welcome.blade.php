<x-guest-layout>
    <div class="div-exclude relative overflow-hidden">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />

        <div class="relative min-h-screen flex flex-col items-center justify-center div-exclude">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl div-exclude">

                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="div-exclude flex lg:justify-center lg:col-start-2">
                        <!-- Logo -->
                        <x-application-logo/>
                    </div>

                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Register</a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <main class="mt-6">
                    <x-crypto-list :topCryptos="$topCryptos" />
                </main>
            </div>
        </div>
    </div>
</x-guest-layout>
