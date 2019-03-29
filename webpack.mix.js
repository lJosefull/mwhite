const mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.sass', 'public/css')
    .copy('resources/assets/images/', 'public/img')
    .copy('resources/assets/js/components/', 'public/js')
    .copy('resources/assets/css/', 'public/css')
    .copy('resources/assets/webfonts/', 'public/webfonts')
    .copy('resources/assets/slick/', 'public/slick')
    .copy('resources/assets/lightgallery/', 'public/lightgallery')
    .copy('resources/assets/galeryVideos/', 'public/galeryVideos');
mix.sourceMaps().version();
