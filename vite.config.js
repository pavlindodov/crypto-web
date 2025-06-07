import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/scroll-to-top.css',
                'resources/js/app.js',
                'resources/js/scroll-to-top.js',
                'resources/js/tradingview-widget.js',
                'resources/js/favorite-toggle.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
    },
});
