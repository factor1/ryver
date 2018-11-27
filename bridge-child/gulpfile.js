var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano')
    rename = require('gulp-rename');

gulp.task('sass', function() {
  return gulp.src('f1-styles.scss')
    .pipe(sass())
    .pipe(gulp.dest(''))
});

gulp.task('minify-css', ['sass'], function() {
  return gulp.src('f1-styles.css')
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(cssnano())
    .pipe(gulp.dest(''))
});

gulp.task('styles', ['minify-css']);
