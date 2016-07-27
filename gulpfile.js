/**
 * Created by buuug7 on 2016/3/24.
 */
'use strict';

var theme = 'default';

var browserSync = require('browser-sync');
var reload = browserSync.reload;

var gulp = require('gulp');

var gulpLoadPlugins = require('gulp-load-plugins');
var plugins = gulpLoadPlugins();


var phpServer = require('gulp-connect-php');
var del = require('del');


var paths = {
  buildSass: ['skin/newskin/frontend/build/sass/**/*.scss'],
  distCssDir: 'skin/newskin/frontend/dist/css/' + theme,

  buildJsDir: ['skin/newskin/frontend/build/js/**/*.js'],
  distJsDir: 'skin/newskin/frontend/dist/js',

  buildHtmlTemplate: [
    'skin/newskin/frontend/build/html-template/index.html',
    'skin/newskin/frontend/build/html-template/second-list.html',
    'skin/newskin/frontend/build/html-template/third-list.html',
    'skin/newskin/frontend/build/html-template/third-list-images.html',
    'skin/newskin/frontend/build/html-template/content.html',
    'skin/newskin/frontend/build/html-template/zhuantizhuanlan.html',
  ],
  distPagegsDir: 'skin/newskin/frontend/dist/pages/' + theme,

  buildImagesDir: 'skin/newskin/frontend/build/images/**/*',
  distImagesDir: 'skin/newskin/frontend/dist/images',

  buildPluginDir: ['skin/newskin/frontend/build/plugins/**/*'],
  distPluginDir: 'skin/newskin/frontend/dist/plugins',

  buildFontsDir: ['skin/newskin/frontend/build/fonts/**/*'],
  distFontsDir: 'skin/newskin/frontend/dist/fonts'
};

// start up a php server at localhost:8888
gulp.task('php', function () {
  phpServer.server({
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
gulp.task('cleanDistImagesDir', function () {
  return del(paths.distImagesDir);
});

// 6 clean dist plugins dir
gulp.task('cleanDistPluginsDir', function () {
  return del(paths.distPluginDir);
});

// build

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
    .pipe(plugins.concat('app.js'))
    // uncomment it if you want to reduce the js file sizes
    .pipe(plugins.uglify())
    .pipe(gulp.dest(paths.distJsDir))
    .pipe(plugins.size({title: 'js'}));
});

// 4 imagesmin
gulp.task('imagemin', ['cleanDistImagesDir'], function () {
  return gulp.src(paths.buildImagesDir)
    .pipe(plugins.cache(plugins.imagemin({
      progressive: true,
      interlaced: true
    })))
    .pipe(gulp.dest(paths.distImagesDir))
    .pipe(plugins.size({title: 'imagemin'}));
});


// 5 parse include html content
gulp.task('fileinclude', ['cleanDistPagesDir'], function () {
  return gulp.src(paths.buildHtmlTemplate)
    .pipe(plugins.fileInclude({
      prefix: '@@',
      basepath: '@file'
    }))
    .pipe(plugins.replace('{{theme}}', theme))
    // minified html
    //.pipe(plugins.htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest(paths.distPagegsDir))
    .pipe(plugins.size({title: 'fileinclude'}));
});

// 6 compile sass file
gulp.task('sass', ['cleanDistCssDir'], function () {
  return gulp.src(paths.buildSass)
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass({
      precision: 10
    }).on('error', plugins.sass.logError))
    .pipe(plugins.autoprefixer({
      browsers: ['last 7 versions'],
      cascade: false
    }))
    // uncomment,because current it does not used
    // .pipe(replace('../../../', '../../'))
    // in product you need uncomment it for minify css
    // Concatenate and minify styles
    .pipe(plugins.if('*.css', plugins.cssnano({
      autoprefixer: false
    })))
    .pipe(plugins.size({title: 'sass'}))
    .pipe(plugins.sourcemaps.write('./'))
    .pipe(gulp.dest(paths.distCssDir));
});


// watch
// watch ./build/sass directory
gulp.task('watch-sass', function () {
  gulp.watch('skin/newskin/frontend/build/sass/**/*.scss', ['sass']);
});

// watch ./build/template directory
gulp.task('watch-template', function () {
  gulp.watch('skin/newskin/frontend/build/html-template/**/*.html', ['fileinclude']);
});

// watch ./build/js directory
gulp.task('watch-js', function () {
  gulp.watch('skin/newskin/frontend/build/js/**/*.js', ['js']);
});

// watch build/images directory
gulp.task('watch-imagemin', function () {
  gulp.watch(paths.buildImagesDir, ['imagemin']);
});


gulp.task('watch', ['php', 'watch-sass', 'watch-js', 'watch-template', 'watch-imagemin']);

gulp.task('clean', ['cleanDistFontsDir', 'cleanDistCssDir', 'cleanDistJsDir', 'cleanDistPagesDir', 'cleanDistImagesDir', 'cleanDistPluginsDir']);

gulp.task('build', ['copyFontsFiles', 'copyPluginFiles', 'js', 'imagemin', 'fileinclude', 'sass']);
