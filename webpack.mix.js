const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .vue() // Додаємо підтримку Vue.js
   .sass('resources/sass/app.scss', 'public/css')
   .setPublicPath('public');
