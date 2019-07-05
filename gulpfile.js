const { src, dest, task, watch, series, parallel } = require( 'gulp' );

// var gulp = require( 'gulp' );
var rename = require( 'gulp-rename' );
var sass = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var sourcemaps = require( 'gulp-sourcemaps' );
var uglify = require( 'gulp-uglify' );
var browserify = require( 'browserify' );
var babelify = require( 'babelify' );
var source = require( 'vinyl-source-stream' );
var buffer = require( 'vinyl-buffer' );
var browserSync  = require( 'browser-sync' ).create();
var reload = browserSync.reload;


var styleSRC = 'src/scss/mystyle.scss';
var styleDIST = './assets/css/';
var styleWatch = 'src/scss/**/*.scss';

var jsSRC = 'myscript.js';
var jsFolder = 'src/js/';
var jsDIST = './assets/js/';
var jsWatch = 'src/js/**/*.js';
var jsFILES = [jsSRC];


function browser_sync(done) {
	browserSync.init({

		// server: {
		// 	baseDir: './'
		// }
		open: false,
		injectChanges: true,
		proxy: 'http://localhost/floodcontrolasia/'
	});

	done();
};

function css(done) {
	src( styleSRC )
	.pipe( sourcemaps.init() )
		.pipe( sass({
			errorLogToConsole: true,
			outputStyle: 'compressed'
		}) )
		.on( 'error', console.error.bind( console ) )
		.pipe( autoprefixer({
			overrideBrowserslist: ['last 2 versions'],
			cascade: false
		}))
		.pipe( rename({ suffix: '.min' }))
		.pipe( sourcemaps.write( './' ) )
		 .pipe( dest( styleDIST ) )
		 .pipe( browserSync.stream() );
 
 	done();
};

function js(done) {
	jsFILES.map(function(entry) {
		return browserify({
			entries: [jsFolder + entry]
		})
		.transform( babelify, {presets: ['@babel/preset-env']})
		.bundle()
		.pipe( source( entry ))
		// .pipe( rename({ extname: '.min.js' }))
		.pipe( buffer())
		.pipe( sourcemaps.init({ loadMaps: true }))
		.pipe( uglify())
		.pipe( sourcemaps.write('./'))
		.pipe( dest( jsDIST ) )
		.pipe( browserSync.stream() );
	});

	done();
};

function watch_files() {
	 watch(styleWatch, css);
	 watch(jsWatch, series(js,reload))
};

task("css", css);
task("js", js);
task("default", parallel(css, js));
task("watch", parallel(watch_files, browser_sync));

// gulp.task('default',gulp.series(['style', 'js']));﻿

// gulp.task('default', done => {
//   // code...
//   done();
// });

// gulp.task('watch', gulp.parallel('default', function() {
 // gulp.watch( styleWatch, gulp.series('style') );
 // gulp.watch( jsWatch, gulp.series('js') );

//  return new Promise(function(resolve, reject) {
//       console.log("HTTP Server Started");
//       resolve();
//     });
// }));
