import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'], // Chemin vers tes fichiers CSS et JS
            refresh: true, // Active le rafraîchissement automatique lors des changements
        }),
    ],
});
