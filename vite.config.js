import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: 'public_html/build',
        emptyOutDir: true,
        manifest: true,
        publicDirectory: 'public_html',
        ssrOutputDirectory: 'public_html',
        rollupOptions: {
            output: {
                entryFileNames: 'js/[name].js',
                assetFileNames: 'css/[name].css',
            },
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            publicDirectory: 'public_html',
            ssrOutputDirectory: 'public_html',
        }),
    ],
    base: '/',
});
