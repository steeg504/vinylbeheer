var elixir = require('laravel-elixir');
require('gulp-concat');
require('gulp-sass');
require('laravel-elixir-bowerbundle');

elixir(function (mix) {
    mix.bower(['jquery', 'bootstrap-sass', 'pixeden-stroke-7-icon'])
    mix.sass(['app.scss','light-bootstrap-dashboard.scss'],'public/bundles/style.css');

    mix.styles(['public/bundles/style.css', 'public/bundles/bundle.css','../resources/assets/css/light-bootstrap-dashboard.css'], 'public/css/style.css', 'public');
    mix.scripts(['public/bundles/bundle.js','../resources/assets/js/light-bootstrap-dashboard.js'], 'public/js/javascript.js', 'public')

    mix.copy('bower_components/pixeden-stroke-7-icon/pe-icon-7-stroke/fonts', 'public/css')
});
