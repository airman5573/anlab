var gulp = require( 'gulp' );
var plumber = require( 'gulp-plumber' );
var sass = require( 'gulp-sass' );
var babel = require( 'gulp-babel' );
var postcss = require( 'gulp-postcss' );
var rename = require( 'gulp-rename' );
var concat = require( 'gulp-concat' );
var uglify = require( 'gulp-uglify' );
var imagemin = require( 'gulp-imagemin' );
var sourcemaps = require( 'gulp-sourcemaps' );
var browserSync = require( 'browser-sync' ).create();
var del = require( 'del' );
var cleanCSS = require( 'gulp-clean-css' );
var autoprefixer = require( 'autoprefixer' );

// Configuration file to keep your code DRY
var cfg = require( './gulpconfig.json' );
var jsFile = cfg.jsFile;
var vendorJS = cfg.vendorJS;
var vendorCSS = cfg.vendorCSS;
var vendorFont = cfg.vendorFont;
var paths = cfg.paths;



gulp.task( 'sass', function() {
	return gulp
		.src( paths.sass + '/*.scss' )
		.pipe(
			plumber( {
				errorHandler( err ) {
					console.log( err );
					this.emit( 'end' );
				},
			} )
		)
		.pipe( sourcemaps.init( { loadMaps: true } ) )
		.pipe( sass( { errLogToConsole: true } ) )
		.pipe( postcss( [ autoprefixer() ] ) )
		.pipe( sourcemaps.write( undefined, { sourceRoot: null } ) )
		.pipe( gulp.dest( paths.css  ) );
} );


gulp.task( 'minifycss', function() {
	return gulp
		.src([
			paths.css + '/main.css',
		])
		.pipe(
			sourcemaps.init( {
				loadMaps: true,
			} )
		)
		.pipe(
			cleanCSS( {
				compatibility: '*',
			} )
		)
		.pipe(
			plumber( {
				errorHandler( err ) {
					console.log( err );
					this.emit( 'end' );
				},
			} )
		)
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.css ) );
} );


gulp.task( 'styles', function( callback ) {
	gulp.series( 'sass', 'minifycss' )( callback );
} );



/**WATCH*/
gulp.task( 'watch', function() {
	gulp.watch(
		[ paths.sass + '/**/*.scss', paths.sass + '/*.scss' ],
		gulp.series( 'styles' )
	);

	// JS는 파일 형태를 변경하지 않는다. 
	// gulp.watch(
	// 	[
    //      paths.js + '/*.js',
	// 		paths.js + '/**/*.js',
	// 	],
	// 	gulp.series( 'scripts' )
	// );

	// Inside the watch task.
	// gulp.watch( paths.images + '/**', gulp.series( 'imagemin-watch' ) );
} );


//Browser Sync
gulp.task( 'browser-sync', function() {
	browserSync.init( cfg.browserSyncOptions );
} );

// gulp.task( 	// 이미지도 별도 변경하지 않는다.
// 	'imagemin-watch',
// 	gulp.series( 'imagemin', function reLoad() {
// 		browserSync.reload();
// 	} )
// );

gulp.task( 'watch-bs', gulp.parallel( 'browser-sync', 'watch' ) );

// Starts watcher (default task)
gulp.task( 'default', gulp.series( 'watch-bs' ) );





/*예외 상황에 활용한다*******************************************************/
/********************************************************/

/*JS*******************************************************/


gulp.task( 'scripts', function() {
	var scripts = jsFile.paths;
	gulp
		.src( scripts, { allowEmpty: true } )
		.pipe( babel( { presets: ['@babel/preset-env'] } ) )
		.pipe( concat( 'main.min.js' ) )
		.pipe( uglify() )
		.pipe( gulp.dest( paths.js + '/dist' ) );

	return gulp
		.src( scripts, { allowEmpty: true } )
		.pipe( babel() )
		.pipe( concat( 'main.js' ) )
		.pipe( gulp.dest( paths.js + '/dist' ) );
} );



/*Vendor*******************************************************/

gulp.task( 'vendor-scripts', function() {
    var scripts = vendorJS.paths;
    return gulp
		.src( scripts, { allowEmpty: true } )
		.pipe(concat( 'vendors.min.js' ) )
		.pipe(gulp.dest( paths.vendors+ '/dist/js' ));
} );

gulp.task( 'vendor-styles', function() {
    var styles = vendorCSS.paths;
    return gulp
		.src( styles, { allowEmpty: true } )
		.pipe(concat( 'vendors.min.css' ) )
		.pipe(gulp.dest( paths.vendors + '/dist/css' ));
} );


gulp.task( 'vendors', gulp.series( 'vendor-scripts', 'vendor-styles' ) );



/*IMAGE*******************************************************/

gulp.task( 'imagemin', () =>
gulp
	.src( paths.images + '/**' )
	.pipe(
		imagemin(
			[
				imagemin.gifsicle( {
					interlaced: true,
					optimizationLevel: 3,
				} ),
				imagemin.mozjpeg( {
					quality: 75,
					progressive: true,
				} ),
				imagemin.optipng(),
				imagemin.svgo(),
			],
			{
				verbose: true,
			}
		)
	)
	.pipe( gulp.dest( paths.images + '/dist' ) )
);


