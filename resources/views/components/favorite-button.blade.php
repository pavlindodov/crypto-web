@php
    $isFavorite = auth()->check() && auth()->user()->favoriteCryptos->contains($crypto->id);
@endphp

@if(auth()->check())
    <button
        class="favorite-toggle
               rounded-full
               bg-white
               shadow
               p-2
               hover:bg-yellow-100
               transition
               duration-200
               focus:ring-yellow-400
               focus:ring-offset-2"
        data-crypto="{{ $crypto->id }}"
        type="button"
        aria-label="Marcar como favorito"
    >
        <svg id="star-{{ $crypto->id }}"
            xmlns="http://www.w3.org/2000/svg"
            fill="{{ $isFavorite ? '#facc15' : '#d1d5db' }}"
            viewBox="0 0 24 24" width="20" height="20">
            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
        </svg>
    </button>
@endif
