import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                tailwindcss(),
                "resources/css/app.css",
                "public/css/detailkamar.css",
                "public/css/payment.css",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});


