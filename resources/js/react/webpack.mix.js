const mix = require('laravel-mix');
const path = require('path');

mix.ts('app.tsx', 'dist/react').react();

mix.webpackConfig({
    resolve: {
        alias: {
            react: path.resolve('./node_modules/react'),
        },
    },
    output: {
        path: __dirname + '/../../..',
    },
});
