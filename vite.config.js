import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/templatePage.css',
                    'resources/css/dashboardOptions.css',
                    'resources/css/listStyle.css',
                    'resources/css/addManualStyle.css',
                    'resources/css/teacher-list/teacherView.css',
                    'resources/css/student-list/studentView.css',
                    'resources/css/parent-list/parentView.css',
                    'resources/css/class-list/classView.css',
                    'resources/css/class-list/classSelector.css',
                    'resources/js/app.js'],
            refresh: true,
        }),
    ]
});
