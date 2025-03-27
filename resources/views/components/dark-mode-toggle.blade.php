<button class="btn-exclude" x-data @click="
    darkMode = !darkMode;
    localStorage.setItem('theme', darkMode ? 'dark' : 'light');
    document.documentElement.classList.toggle('dark', darkMode);
">
    <span class="mr-2" x-text="darkMode ? '🌙' : '☀️'"></span>
</button>
