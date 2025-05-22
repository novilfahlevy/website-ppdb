import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Admin JS
                'resources/js/admin/app.js',
                'resources/js/admin/sb-admin-2.min.js',
                'resources/js/admin/chart.js',
                'resources/js/admin/jquery.min.js',
                'resources/js/admin/bootstrap.bundle.min.js',
                
                // Global CSS
                'resources/css/main.css',
                'resources/css/base.css',
                'resources/css/footer.css',
                'resources/css/forms.css',
                'resources/css/header.css',
                'resources/css/hero.css',
                'resources/css/navigation.css',
                'resources/css/preloader.css',
                'resources/css/registration-pages.css',
                'resources/css/sections.css',
                'resources/css/utilities.css',
                'resources/css/variables.css',

                // Global JS
                'resources/js/main.js',

                // Admin CSS
                'resources/css/admin/app.css',
                'resources/css/admin/sb-admin-2.min.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});