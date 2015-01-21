//Dependancies
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    plumber = require('gulp-plumber'),
    concat = require('gulp-concat'),
    gulpif = require('gulp-if'),
    scsslint = require('gulp-scss-lint'),
    notify = require('gulp-notify'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify');

    //Styles task
    gulp.task('styles', function() {

        return gulp.src('../src/scss/*.scss')
        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
        .pipe(sass())
        //.pipe(gulpif(isProd, minifycss()))
        .pipe(gulp.dest('../dest/css/'));
    });


    // JS //
    gulp.task('scripts', function() {
        return gulp.src( ['../src/js/libs/*.js'] )
        .pipe(concat('vendors.js'))
        .pipe(gulp.dest('../dest/js/'))
    });


    // Assign Default Gulp task //
    gulp.task('default', [
        'styles',
        'scripts'
        ], function() {
            gulp.start('complete');
            gulp.start('watch');
    });

    //Complete function
    gulp.task('complete', function() {


    });


    // Assign Watch Task //
    gulp.task('watch', function() {

        // Mobile
        gulp.watch(['..src/css/*.scss', '../src/css/**/*.scss'], ['styles']);
        gulp.watch(['../src/js/*.js', '../src/js/**/*.js'], ['scripts']);

        });
