const devURL = 'http://localhost:3000';

// == == == == == == == == == == == == == == ==
// This gulpfile uses the Laravel Elixir API ==
// For Elixir documentation, look here == == ==
// https://laravel.com/docs/elixir  == == == ==
// == == == == == == == == == == == == == == ==

const elixir = require("laravel-elixir");
require('laravel-elixir-webpack-official');

elixir.config.publicPath = './public/assets/';
elixir.config.assetsPath = './resource/assets/';

elixir((mix) => {
    mix
        .webpack('resources/assets/js/main.js')
        .browserSync({
            files: [
                'resource/assets',
            ],
            proxy: devURL
        })
});