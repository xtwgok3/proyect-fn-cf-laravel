import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import viteCompression from 'vite-plugin-compression';

export default defineConfig({
    server: {
        host: '127.0.0.1', // Escuchar en todas las interfaces
        port: 5173, // Asegúrate de que este puerto sea el que usas en tu túnel
        strictPort: false, // Lanza un error si el puerto está ocupado
        origin: 'https://vite.psy-electronics.com',
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/cart.js',
                'resources/js/bootstrap.js',
                'resources/css/theme.css',
                'resources/css/app.css',
		'resources/css/home.css',
            ],
            refresh: true,
        }),
        viteCompression({ // Configura el plugin de compresión
            algorithm: 'gzip', // gzip
            threshold: 10240,
            deleteOriginFile: false,
        }),
    ],
});

