let mix = require('laravel-mix');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const source = 'platform/themes/' + directory;
const dist = 'public/themes/' + directory;

mix.sass(source + '/assets/sass/rtl.scss', dist + '/css')
    .sass(source + '/assets/sass/style.scss', dist + '/css')
    .sass(source + '/assets/sass/shop.scss', dist + '/css')

    .copy(dist + '/css/style.css', source + '/public/css')
    .copy(dist + '/css/shop.css', source + '/public/css')
    .copy(dist + '/css/rtl.css', source + '/public/css')

    .js(source + '/assets/js/script.js', dist + '/js')
    .js(source + '/assets/js/post.js', dist + '/js')
    .js(source + '/assets/js/icons-field.js', dist + '/js')

    .copy(dist + '/js/script.js', source + '/public/js')
    .copy(dist + '/js/post.js', source + '/public/js')
    .copy(dist + '/js/icons-field.js', source + '/public/js');
