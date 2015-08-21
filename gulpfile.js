// var elixir = require('laravel-elixir');

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

// elixir(function(mix) {
//     mix.less('app.less');
// });


//Gulp
var gulp = require('gulp');
 
//Jade PHP
var jade = require('gulp-jade-php');
 
gulp.task('templates', function(){
    return gulp.src('resources/views/jade/*.jade')
        .pipe(jade())
        .pipe(gulp.dest('resources/views/'));
});

gulp.task('default', function(){
    gulp.watch('resources/views/jade/*.jade', ['templates']);
});
