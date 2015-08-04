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
    mix.less([
        'admin/AdminLTE.less',
        'admin/custom.less',
        'admin/skins/skin-black.less'
    ], 'public/css/admin.css');

    // Images
    mix.copy('resources/assets/img/', 'public/img/');

    // Fonts
    mix.copy('resources/fonts/', 'public/fonts/');

    // Scripts
    mix.copy('resources/assets/js/admin/', 'public/js/admin/');
    mix.scripts([
        "jquery-1.11.1.js",
    ]);

    // Admin plugins
    mix.copy('resources/plugins/admin/', 'public/plugins/admin/');
});