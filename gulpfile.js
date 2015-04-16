var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'animate.css',
        'sprites.css',
        'style.css'
    ]);

    mix.scripts([
        'jquery-1.11.1.min.js',
        'jquery.uniform.min.js',
        'wow.min.js',
        'jquery.slicknav.min.js',
        'scripts.js'
    ])

    mix.version('public/css/all.css');

});
