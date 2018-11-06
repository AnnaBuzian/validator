let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sourceMaps();

mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('node_modules/font-awesome/fonts/*', 'public/fonts');

if (mix.inProduction()) {
    mix.version();
}