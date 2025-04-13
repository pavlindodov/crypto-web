<button class="btn-exclude" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" @click="
    darkMode = !darkMode;
    localStorage.setItem('theme', darkMode ? 'dark' : 'light');
    document.documentElement.classList.toggle('dark', darkMode);
    loadTradingViewWidget(darkMode ? 'dark' : 'light'); // Llama a la función para recargar el widget
">
    <span class="mr-2" x-text="darkMode ? '🌙' : '☀️'"></span>
</button>
