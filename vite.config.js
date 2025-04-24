import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/scroll-to-top.css',
                'resources/js/scroll-to-top.js',
                'resources/js/tradingview-widget.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
    },
});
