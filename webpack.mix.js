const mix = require('laravel-mix');
const path = require('path');

mix.ts('resources/js/vue3/app.ts', 'dist/vue3').vue();
mix.ts('resources/js/react/app.js', 'dist/react').react();

mix.webpackConfig({
	resolve: {
		alias: {
			vue: path.resolve('./node_modules/vue'),
			react: path.resolve('./node_modules/react'),
		},
	},
});
