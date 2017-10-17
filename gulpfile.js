var elixir = require('laravel-elixir');


elixir(function(mix) {
    mix.sass([
        'style.scss',
    ], 'public/user/style.css');


});