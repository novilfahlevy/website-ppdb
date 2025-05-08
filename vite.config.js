import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/main.css',

                'resources/css/admin/app.css',
                'resources/js/admin/app.js',

                'resources/css/admin/sb-admin-2.min.css',
                'resources/js/admin/sb-admin-2.min.js',

                'resources/js/admin/jquery.min.js',
                'resources/js/admin/chart.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
