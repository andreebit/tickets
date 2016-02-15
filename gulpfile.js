var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'styles.css',
        'responsive.css'
    ],  'public/assets/css/all.css')
    .scripts([
        'global.js'
    ],  'public/assets/js/all.js')
    .scripts([
        'gmaps.js'
    ],  'public/assets/js/gmaps.min.js');
});
