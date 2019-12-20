const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/frontend/frontend.scss', 'public/css')
    .sass('resources/sass/backend/backend.scss', 'public/css')
    .sourceMaps()
    .options({
        extractVueStyles: true,
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ]});

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.json', '.vue'],
        alias: {
        '~': path.join(__dirname, './resources/js'),
        '$comp': path.join(__dirname, './resources/js/components')
        }
    },
    plugins: [
        new VuetifyLoaderPlugin()
    ]
    });
