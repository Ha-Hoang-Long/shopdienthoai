const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
mix.js('resources/js/admin.js', 'public/js')
mix.js('resources/js/custom.min.js', 'public/js')
mix.js('resources/js/bootstrap.min.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/admin.css', 'public/css')
    .postCss('resources/css/custom.min.css', 'public/css')
    .postCss('resources/css/bootstrap.min.css', 'public/css', [
        //
    ]);
