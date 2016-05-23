/**
 * Created by buuug7 on 2016/3/24.
 */
'use strict';

var theme = 'default';

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var replace = require('gulp-replace');
var php = require('gulp-connect-php');
var fileinclude = require('gulp-file-include');
var del = require('del');
var imagemin = require('gulp-imagemin');
var cleanCss = require('gulp-clean-css');
var htmlmin = require('gulp-htmlmin');

var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var paths = {
  buildSass: ['build/sass/**/*.scss'],
  distCssDir: 'dist/css/' + theme,

  buildJsDir: ['build/js/**/*.js'],
  distJsDir: 'dist/js',

  buildHtmlTemplate: [
    'build/html-template/index.html',
    'build/html-template/second-list.html',
    'build/html-template/third-list.html',
    'build/html-template/third-list-images.html',
    'build/html-template/content.html'
  ],
  distPagegsDir: 'dist/pages/' + theme,

  //buildImagesDir: 'build/images/**/*',
  //distImagesDir: 'dist/images',

  buildPluginDir: ['build/plugins/**/*'],
  distPluginDir: 'dist/plugins',

  buildFontsDir: ['build/fonts/**/*'],
  distFontsDir: 'dist/fonts'
};

// start up a php server at localhost:8888
gulp.task('php', function () {
  php.server({
    port: 8888,
    keepalive: true
  });
});

// clean
// 1 clean dist plugins dir
gulp.task('cleanDistFontsDir', function () {
  return del(paths.distFontsDir);
});

// 2 clean dist css dir
gulp.task('cleanDistCssDir', function () {
  return del(paths.distCssDir);
});

// 3 clean dist js dir
gulp.task('cleanDistJsDir', function () {
  return del(paths.distJsDir);
});

// 4 clean dist pages dir
gulp.task('cleanDistPagesDir', function () {
  return del(paths.distPagegsDir);
});

// 5 clean dist images dir
/*gulp.task('cleanDistImagesDir', function () {
  return del(paths.distImagesDir);
});*/

// 6 clean dist plugins dir
gulp.task('cleanDistPluginsDir', function () {
  return del(paths.distPluginDir);
});

// build
// copy fonts to css
gulp.task('copyFontsToCssDir', function () {
  return gulp.src(paths.buildFontsDir)
    .pipe(gulp.dest(paths.distCssDir));
});

// 1 copy build plugins files to dist plugin folder
gulp.task('copyFontsFiles', ['cleanDistFontsDir'], function () {
  return gulp.src(paths.buildFontsDir)
    .pipe(gulp.dest(paths.distFontsDir));
});

// 2 copy build plugins files to dist plugin folder
gulp.task('copyPluginFiles', ['cleanDistPluginsDir'], function () {
  return gulp.src(paths.buildPluginDir)
    .pipe(gulp.dest(paths.distPluginDir));
});

// 3 concat js files
gulp.task('js', ['cleanDistJsDir'], function () {
  return gulp.src(paths.buildJsDir)
    .pipe(concat('app.js'))
    // uncomment it if you want to reduce the js file sizes
    //.pipe(uglify())
    .pipe(gulp.dest(paths.distJsDir));
});

// 4 imagesmin
/*gulp.task('imagesmin', ['cleanDistImagesDir'], function () {
  return gulp.src(paths.buildImagesDir)
    .pipe(imagemin({
      optimizationLevel: 5,
    }))
    .pipe(gulp.dest(paths.distImagesDir));
});*/

// 5 parse include html content
gulp.task('fileinclude', ['cleanDistPagesDir'], function () {
  return gulp.src(paths.buildHtmlTemplate)
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file'
    }))
    .pipe(replace('{{theme}}', theme))
    // minified html
    //.pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest(paths.distPagegsDir));
});

// 6 compile sass file
gulp.task('sass', ['cleanDistCssDir'], function () {
  return gulp.src(paths.buildSass)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    // uncomment,because current it doesnot used
    // .pipe(replace('../../../', '../../'))
    // in product you need uncomment it for minify css
    // .pipe(cleanCss({compatibility: 'ie8'}))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.distCssDir));
});

// watch
// watch ./build/sass directory
gulp.task('watch-sass', function () {
  gulp.watch('build/sass/**/*.scss', ['sass']);
});

// watch ./build/template directory
gulp.task('watch-template', function () {
  gulp.watch('build/html-template/**/*.html', ['fileinclude']);
});

// watch ./build/js directory
gulp.task('watch-js', function () {
  gulp.watch('build/js/**/*.js', ['js']);
});

gulp.task('watch', ['php', 'watch-sass', 'watch-js', 'watch-template']);

gulp.task('clean', ['cleanDistFontsDir', 'cleanDistCssDir', 'cleanDistJsDir', 'cleanDistPagesDir', 'cleanDistImagesDir', 'cleanDistPluginsDir']);

gulp.task('build', ['copyFontsFiles', 'copyPluginFiles', 'js', 'imagesmin', 'fileinclude', 'sass']);
