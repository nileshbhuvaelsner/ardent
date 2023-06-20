// This file compiles .scss and .js files then outputs them to the theme root folder.
// Run this file by typing "gulp" in a root terminal, or within Visual Studio Code through Terminal->Run Task in the top menu.

const { src, dest, watch, series, parallel } = require('gulp');
const sourcemaps    = require('gulp-sourcemaps');
const sass          = require('gulp-sass')(require('sass'));
const concat        = require('gulp-concat');
const uglify        = require('gulp-uglify');
const postcss       = require('gulp-postcss'); 
const autoprefixer  = require('autoprefixer'); 
const cssnano       = require('cssnano');

// File paths.
const files = {
    scssPath        : 'assets/scss/**/*.scss', 
    jsPath          : 'assets/js/**/*.js',    
    cssOutputPath   : 'assets/css/',
    jsOutputPath    : './',
}

// Compile SCSS and move to dist folder.
function scssTask(){
    return src(files.scssPath)
    .pipe(sourcemaps.init())
    .pipe(sass())
    //.pipe(postcss([ autoprefixer(), cssnano() ]))
    .pipe(postcss([ autoprefixer() ]))
    //.pipe(concat('main.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(files.cssOutputPath)
        //.pipe(dest('./')
    ); 
}

// Compile JS and move to dist folder.
function jsTask(){
    return src([
        files.jsPath
    ])
    .pipe(concat('script.js'))
    .pipe(uglify())
    .pipe(dest(files.jsOutputPath)
    ); 
}

// Watch JS and SCSS files.
function watchTask(){
    watch([files.scssPath, files.jsPath],
        series(
            parallel(scssTask, jsTask),
        )
    ); 
}

// Run tasks.
exports.default = series(
    parallel(scssTask, jsTask),
watchTask );