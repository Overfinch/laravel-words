import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: './public_html/build'
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            publicDirectory: '/public_html',
        })
    ],
    server: {
        hmr: {
            host: 'localhost'
        },
        port: 3000,
        host: '0.0.0.0',
    },
});
