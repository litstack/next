const mix = require('laravel-mix');
const path = require('path');

mix.ts('app.ts', 'dist/vue3').vue();

mix.webpackConfig({
    resolve: {
        alias: {
            vue: path.resolve('./node_modules/vue'),
        },
    },
    output: {
        path: __dirname + '/../../..',
    },
});
