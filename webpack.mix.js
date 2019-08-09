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

mix.js('resources/js/app.js', 'public/js')

   //noUiSlider
   // .js('resources/js/noUiSlider/noUiSlider.js', 'public/js/noUiSlider')   


   // Flickity
   //.js('resources/js/flickity/flickity.js', 'public/js/flickity')


   .sass('resources/sass/mobile.scss', 'public/css')
   .sass('resources/sass/app.scss', 'public/css');
