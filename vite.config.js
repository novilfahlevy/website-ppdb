import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/sb-admin-2.min.css',
                'resources/js/sb-admin-2.min.js',
                'resources/js/demo/chart-area-demo.js',
                'resources/js/demo/chart-pie-demo.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
