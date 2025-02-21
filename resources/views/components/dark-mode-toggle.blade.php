<button x-data @click="
    darkMode = !darkMode;
    localStorage.setItem('theme', darkMode ? 'dark' : 'light');
    document.documentElement.classList.toggle('dark', darkMode);
">
    <span x-text="darkMode ? '🌙' : '☀️'"></span>
</button>
