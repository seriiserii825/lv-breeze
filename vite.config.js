import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/course/course.js",
                "resources/js/frontend/frontend.js",
                "resources/js/admin/password.js"
            ],
            refresh: [
                "resources/views/**/*.blade.php",
                "app/**/*.php",
                "routes/**/*.php",
                "resources/css/**/*.css",
            ],
        }),
    ],
});
