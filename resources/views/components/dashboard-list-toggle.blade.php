@props(['showFavorites' => false])

<form method="GET" action="{{ route('dashboard') }}" class="mb-6">
    <label for="filter" class="mr-2 font-semibold text-gray-700">Show:</label>
    <select name="filter" id="filter"
        class="dark:bg-gray-900 dark:text-gray-100 bg-gray-100 rounded-lg border-gray-300 focus:ring-yellow-400 focus:border-yellow-400 transition"
        onchange="this.form.submit()">
        <option value="all" {{ !$showFavorites ? 'selected' : '' }}>All</option>
        <option value="favorites" {{ $showFavorites ? 'selected' : '' }}>Favorites</option>
    </select>
</form>
