import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            // Limit refresh to source files; avoid watching compiled Blade views
            refresh: [
                'resources/views/**/*.blade.php',
                'resources/js/**/*.js',
                'resources/css/**/*.css',
                'routes/**/*.php',
                // DO NOT include storage/framework/views to prevent reload storms
            ],
        }),
    ],
});
