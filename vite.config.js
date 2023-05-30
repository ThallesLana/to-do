import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

// Obtém a lista de arquivos CSS em "resources/css"
const cssFiles = fs.readdirSync('resources/css').map((filename) => `resources/css/${filename}`);
const cssComponentFiles = fs.readdirSync('resources/css/components').map((filename) => `resources/css/components/${filename}`);

// Obtém a lista de arquivos JS em "resources/js"
const jsFiles = fs.readdirSync('resources/js').map((filename) => `resources/js/${filename}`);

export default defineConfig({
    plugins: [
        laravel({
            input: [...cssFiles, ...cssComponentFiles, ...jsFiles],
        }),
    ],
});
