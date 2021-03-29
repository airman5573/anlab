
// 1) proxy 변경 : ~~.local/
// 2) Vendor 추가시 gulpconfig.json 내 경로 추가  gulp vendors 실행 -> /node_module로 부터 추출 -> /dist에 vendor.min.css 생성됨
// 3) 이미지 잘 안되는데.. gulp imagemin으로 보내기 
// "./node_modules/bootstrap4/dist/js/bootstrap.bundle.min.js",
// "./node_modules/gsap/dist/gsap.min.js",
// "./node_modules/gsap/dist/ScrollTrigger.min.js",
// "./node_modules/p5/lib/p5.min.js"
// "./node_modules/aos/dist/aos.js",
// "./node_modules/swiper/swiper-bundle.min.js"

// "./node_modules/bootstrap/dist/css/bootstrap.min.css",
// "./node_modules/font-awesome/css/font-awesome.css",
// "./node_modules/swiper/swiper-bundle.min.css",
// "./node_modules/aos/dist/aos.css"


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


/**
 SCSS
 **/

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
		.pipe( gulp.dest( paths.dist + '/css' ) );
} );


gulp.task( 'minifycss', function() {
	return gulp
		.src([
			paths.dist + '/css/main.css',
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
		.pipe( gulp.dest( paths.dist + '/css/' ) );
} );


gulp.task( 'styles', function( callback ) {
	gulp.series( 'sass', 'minifycss' )( callback );
} );




/**
JS
**/

gulp.task( 'scripts', function() {
	var scripts = jsFile.paths;
	gulp
		.src( scripts, { allowEmpty: true } )
		.pipe( babel( { presets: ['@babel/preset-env'] } ) )
		.pipe( concat( 'app.min.js' ) )
		.pipe( uglify() )
		.pipe( gulp.dest( paths.dist + '/js' ) );

	return gulp
		.src( scripts, { allowEmpty: true } )
		.pipe( babel() )
		.pipe( concat( 'app.js' ) )
		.pipe( gulp.dest( paths.dist + '/js' ) );
} );



/**
IMAGE
 */
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
     .pipe( gulp.dest( paths.dist + '/images' ) )
);





/**
Vendor
**/


gulp.task( 'vendor-scripts', function() {
    var scripts = vendorJS.paths;
    return gulp
		.src( scripts, { allowEmpty: true } )
		.pipe(concat( 'vendors.min.js' ) )
		.pipe(gulp.dest( paths.dist + '/js' ));
} );

gulp.task( 'vendor-styles', function() {
    var styles = vendorCSS.paths;
    return gulp
		.src( styles, { allowEmpty: true } )
		.pipe(concat( 'vendors.min.css' ) )
		.pipe(gulp.dest( paths.dist + '/css' ));
} );


gulp.task( 'vendor-font', function() {
    var fonts = vendorFont.paths;
    return gulp
		.src( fonts + '/*.**')
		.pipe(gulp.dest( paths.dist + '/fonts' ));
} );

gulp.task( 'vendors', gulp.series( 'vendor-scripts', 'vendor-styles', 'vendor-font' ) );


/**
WATCH
 */




gulp.task( 'watch', function() {
	gulp.watch(
		[ paths.sass + '/**/*.scss', paths.sass + '/*.scss' ],
		gulp.series( 'styles' )
	);
	gulp.watch(
		[
            paths.js + '/*.js',
			paths.js + '/**/*.js',
		],
		gulp.series( 'scripts' )
	);

	// Inside the watch task.
	gulp.watch( paths.images + '/**', gulp.series( 'imagemin-watch' ) );
} );


//Browser Sync
gulp.task( 'browser-sync', function() {
	browserSync.init( cfg.browserSyncOptions );
} );

gulp.task(
	'imagemin-watch',
	gulp.series( 'imagemin', function reLoad() {
        console.log('hey')
		browserSync.reload();
	} )
);

gulp.task( 'watch-bs', gulp.parallel( 'browser-sync', 'watch' ) );

// Starts watcher (default task)
gulp.task( 'default', gulp.series( 'watch-bs' ) );