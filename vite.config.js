import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/googlemapsAPI/main.js',
                'resources/js/googlemapsAPI/form.js',
                'resources/js/postfile/imgShow.js',
                'resources/js/postfile/noFileName.js',
                'resources/js/googlemapsAPI/spotRenderer.js'
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost',
        },
    },
});