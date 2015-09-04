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

var bower_path = "./vendor/bower_components";
var paths = {
    'jquery'     : bower_path + "/jquery/dist",
    'bootstrap'  : bower_path + "/bootstrap-sass/assets",
    'fontawesome': bower_path + "/font-awesome"
};

elixir(function(mix) {

    mix.sass("app.scss", "public/assets/css", {
        includePaths: [
            paths.bootstrap + '/stylesheets',
            paths.fontawesome + '/scss'
        ]
    })
    .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/assets/fonts')
    .scripts([
     paths.jquery + "/jquery.js",
     paths.bootstrap + "/javascripts/bootstrap.js"
    ], 'public/assets/js/app.js', './vendor/bower_components/');

    mix.copy(paths.fontawesome + '/fonts', 'public/assets/fonts');

});