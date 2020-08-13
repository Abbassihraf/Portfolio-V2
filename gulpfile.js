const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('gulp-cssnano');
const gulpIf = require('gulp-if');
// const uglify = require('gulp-uglify');
const useref = require('gulp-useref');
const fileinclude = require('gulp-file-include');
const imagemin = require('gulp-imagemin');
const cache = require('gulp-cache');
const terser = require('gulp-terser');



//compile scss into css
let style = () => {
    // 1. where is my scss file
    return gulp.src('src/sass/**/*.scss')
        // 2. pass the file through sass compiler
        .pipe(sass().on('error', sass.logError))
        // 3. pass the file through autoprifixer
        .pipe(autoprefixer())
        // 4. pass the file through css minifier
        .pipe(cssnano())
        // 5. intilizing sourcemaps
        .pipe(sourcemaps.init())
        // 6. pass the files through sourcemaps ?
        .pipe(sourcemaps.write('.'))
        // 7. where do i save the compiled CSS ?
        .pipe(gulp.dest('dist/css'))
        // 8. stream changes to all browsers
        .pipe(browserSync.stream());
}
