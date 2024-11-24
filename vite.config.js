import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/templatePage.css',
                    'resources/css/dashboardOptions', 
                    'resources/js/app.js'],
            refresh: true,
        }),
    ]
});
