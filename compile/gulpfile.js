/*!
 * gulp
 * $ npm install
 */

// Load plugins
var gulp         = require('gulp'),
		autoprefixer = require('gulp-autoprefixer'),
		cache        = require('gulp-cache'),
		concat       = require('gulp-concat-util'),
		livereload   = require('gulp-livereload'),
		minifycss    = require('gulp-minify-css'),
		notify       = require('gulp-notify'),
		plumber 		 = require('gulp-plumber'),
		rename       = require('gulp-rename'),
		sass         = require('gulp-sass'),
		size         = require('gulp-size'),
		uglify       = require('gulp-uglify'),
		util 				 = require('gulp-util');

// Styles
gulp.task('styles', function() {
  return gulp.src('styles/site.scss')
    .pipe(sass({ style: 'expanded', }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest('../www/assets/css'))
    .pipe(size({gzip: false, showFiles: true}))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifycss())
    .pipe(size({gzip: false, showFiles: true}))
    .pipe(gulp.dest('../www/assets/css'))
    .pipe(notify({ message: 'Styles task complete' })); // need to figure out how to only notify on error.
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src([
  		'scripts/vendor/*.js',
  		'scripts/site.js',
  		'scripts/modules/*js'
  	])
    .pipe(concat('site.js'))
    .pipe(concat.header('$(function() {\n'))
    .pipe(concat.footer('});\n'))
    .pipe(gulp.dest('../www/assets/js'))
    .pipe(size({gzip: false, showFiles: true}))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(size({gzip: false, showFiles: true}))
    .pipe(gulp.dest('../www/assets/js'))
    .pipe(notify({ message: 'Scripts task complete' })); // need to figure out how to only notify on error.
});

// Default task
gulp.task('default', function() {
    gulp.start('styles', 'scripts');
});

// Watch
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('styles/**/*.scss', ['styles']);

  // Watch .js files
  gulp.watch('scripts/**/*.js', ['scripts']);

  // Watch image files - will eventually setup image optimization
  // gulp.watch('images/**/*', ['images']);

  // Create LiveReload server
  livereload.listen();

  // Watch any files in ../www/assets/, reload on change
  gulp.watch(['../www/assets/**']).on('change', livereload.changed);

});
