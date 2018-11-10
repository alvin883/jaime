process.env.DISABLE_NOTIFIER = true;
var gulp = require('gulp'),
	plumber = require('gulp-plumber'),
	autoprefixer = require('gulp-autoprefixer'),
	notify = require( 'gulp-notify' ),
	sass = require('gulp-sass');

var options = {};
options.sass = {
	errLogToConsole: true,
	precision: 8,
	noCache: true
};

gulp.task('styles', function () {
	return gulp.src('./sass/style.scss')
		.pipe(plumber())
		.pipe(sass(options.sass))
		.pipe(autoprefixer())
		.pipe(gulp.dest('.'))
		.pipe(notify({ title: 'Sass', message: 'sass task complete' }))
});

gulp.task('login-styles', function () {
	return gulp.src('./sass/login-style.scss')
		.pipe(plumber())
		.pipe(sass(options.sass))
		.pipe(autoprefixer())
		.pipe(gulp.dest('./src/css'))
		.pipe(notify({ title: 'Sass', message: 'sass task complete' }))
});

gulp.task('watch', function () {
	gulp.watch('./sass/**/*.scss', gulp.parallel([gulp.series('styles'), gulp.series('login-styles')]));
});

gulp.task('default', gulp.series('watch'));