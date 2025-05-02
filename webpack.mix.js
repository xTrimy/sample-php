const mix = require('laravel-mix');

mix.js('views/js/bootstrap.js', 'public/js')
    .postCss('views/css/app.css', 'public/css', [
        require("@tailwindcss/postcss"),
    ]);
mix.options({
    processCssUrls: false
});