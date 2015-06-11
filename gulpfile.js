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
        'style.css',
        'select2.css',
    ]);

    mix.scripts([
        'jquery-1.11.2.min.js',
        'jquery.uniform.min.js',
        'wow.min.js',
        'jquery.slicknav.min.js',
        'scripts.js',
        'select2.min.js',
        'spin.min.js',
        'jquery.form.min.js',
        'jquery.noty.packaged.min.js'
    ])

    mix.version('public/css/all.css');

});
