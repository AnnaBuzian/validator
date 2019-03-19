let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sourceMaps();

mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('node_modules/font-awesome/fonts/*', 'public/fonts');

mix.js('resources/assets/js/admin.js', 'public/js')
    .sass('resources/assets/sass/admin.scss', 'public/css')

mix.copy('node_modules/trumbowyg/dist/ui/icons.svg', 'public/js/ui/icons.svg')

mix.copy('node_modules/blueimp-file-upload/js/jquery.fileupload-ui.js', 'public/js/fileUpload.js')
mix.copy('resources/assets/sass/fileUpload.css', 'public/css/fileUpload.css')

if (mix.inProduction()) {
    mix.version();
}