'use strict';

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    rename = require("gulp-rename"),
    replace = require("gulp-replace"),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    modernizr = require('gulp-modernizr'),
    connect = require('gulp-connect-php'),
    browserSync = require('browser-sync');

var pkg = require('./package.json');

gulp.task('connect-sync', function() {
  connect.server({}, function (){
    browserSync({
      proxy: '127.0.0.1',
      notify: false
    });
  });
});

gulp.task('vendor', function () {

  	gulp.src('./node_modules/normalize.css/normalize.css')
  		.pipe(rename("_normalize.scss"))
  		.pipe(gulp.dest('./src/sass/vendor'));

  	gulp.src('./node_modules/jquery/dist/jquery.min.js')
  		.pipe(rename("jquery-"+pkg.dependencies.jquery+".min.js"))
  		.pipe(gulp.dest('./js/vendor'));

    // For more features: https://github.com/Modernizr/Modernizr/blob/master/lib/config-all.json
    gulp.src('./js/*.js')
        .pipe(modernizr({
            "options": [
                "html5shiv",
                "setClasses",
            ],
            "tests": []
        }))
        .pipe(uglify())
        .pipe(gulp.dest("./js/vendor/"));

});

gulp.task('templates', function () {
	gulp.src('./src/templates/html.php')
		.pipe(replace(/{{JQUERY_VERSION}}/g, pkg.dependencies.jquery))
		.pipe(rename("index.php"))
		.pipe(gulp.dest('.'));
});

gulp.task('sass', function () {
  	gulp.src('./src/sass/styles.scss')
    	.pipe(sass().on('error', sass.logError))
    	.pipe(gulp.dest('./css'));
});

gulp.task('compress', function() {
    return gulp.src('./src/js/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('./js'));
});

gulp.task('watch', function () {
    watch('./src/sass/**/*.scss', function () {
        gulp.start('sass');
        browserSync.reload();
    });

    watch('./src/js/*.js', function () {
        gulp.start('compress');
        browserSync.reload();
    });

    watch('./src/templates/**/*.php', function () {
        gulp.start('templates');
        browserSync.reload();
    });
});

gulp.task('build', ['vendor', 'templates', 'sass', 'compress']);
gulp.task('default', ['vendor', 'templates', 'sass', 'compress', 'connect-sync', 'watch']);