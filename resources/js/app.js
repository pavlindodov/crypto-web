import './bootstrap';
import './tradingview-widget.js';
import './scroll-to-top.js';
import './favorite-toggle.js';


document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
});
