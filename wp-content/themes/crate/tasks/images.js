'use strict';

import gulp from 'gulp';
import path from 'path';
import svgcss from 'gulp-svg-css';
import svgstore from 'gulp-svgstore';
import svgmin from 'gulp-svgmin';
import tap from 'gulp-tap';
import inject from 'gulp-inject';
import imagemin from 'gulp-imagemin';
import imageDataURI from 'gulp-image-inline';
import childProcess from 'child_process';
import concat from 'gulp-concat';
import del from 'del';
import rename from 'gulp-rename';
import webshot from 'webshot';
import { styles } from './styles';
import { paths, userPath } from './constants';

const exec = childProcess.exec;

// Optimize SVG Task
const svgOptimize = () => {
	return gulp.src(paths.svgs.src)
		.pipe(svgmin( (file) => {
			let prefix = path.basename(file.relative, path.extname(file.relative));
			return {
				plugins: [{
					cleanupIDs: {
						prefix: prefix + '-',
						minify: true
					}
				}]
			}
		}));
}

// SVG Style Task
const svgStyle = () => {
	return gulp.src(paths.svgs.src)
		.pipe(svgcss({ fileName: '_icons', fileExt: 'scss', cssPrefix: 'icon-', addSize: true }))
		.pipe(gulp.dest(paths.svgs.dest));
}

// SVG Inline Task
const svgInline = () => {
	let svgs = gulp
		.src(paths.svgs.src)
		.pipe(rename({ prefix: 'icon-' }))
		.pipe(svgstore({ inlineSvg: true }));

	let fileContents = (filePath, file) => {
		return file.contents.toString();
	}

	return gulp
		.src('./template-parts/header-svg.php')
		.pipe(inject(svgs, { transform: fileContents }))
		.pipe(gulp.dest('./template-parts/'));
}

// Sprite Task
const sprite = () => {
	return gulp.src(paths.sprite.src)
		.pipe(imagemin())
		.pipe(imageDataURI({
			dimension: true,
			customClass: function (className, file) {
				var customClass = 'icon-' + className;
				return customClass;
			}
		}))
		.pipe(concat('_sprite.scss'))
		.pipe(gulp.dest(paths.sprite.dest));
}


const cleanOriginalTemplateImage = () => {
	return del(paths.imgs.template);
}

// Backup Original Image for Template Task
const templateBackup = () => {
	return gulp.src(paths.imgs.template)
		.pipe(gulp.dest(paths.imgs.proc_dest));
}

// Optimize Image for Template Task
const templateOptimize = () => {
	return gulp.src(paths.imgs.template)
		.pipe(imagemin())
		.pipe(gulp.dest(paths.imgs.dest))
		.on('end', function () {
			cleanOriginalTemplateImage();
		});
}


// Media Uploads Task
const mediaUpload = (cb) => {
	return gulp.src(paths.imgs.media).pipe(tap(function (file) {
		exec('wp media import ' + file.path, function (err, stdout, stderr) {
			console.log(stdout);
			console.log(stderr);
			cb(err);
		});
	}));
}

// Clean uploaded images
const mediaClean = (cb) => {
	setTimeout(function() {
		return del(paths.imgs.media);
		
	}, 3000)
	cb();
}

// Take screenshot of site for child theme
const screenshot = (cb) => {
	let options = {
		screenSize: {
			width: 1200,
			height: 900
		},
		shotSize: {
			width: 1200,
			height: 900
		},
		streamType: 'png',
		renderDelay: 3000
	};

	webshot( userPath[4] + '.' + userPath[2] + '.cshp.co', '../crate-child/screenshot.png', options, function(err) {
	});

	cb();
}

const media = gulp.series(mediaUpload, mediaClean);
const templateImages = gulp.series(templateBackup, templateOptimize);
const svgCompile = gulp.series(svgStyle, styles);
const svg = gulp.series(svgOptimize, gulp.parallel(svgCompile, svgInline));

export {
	media,
	sprite,
	svg,
	screenshot,
	svgStyle,
	svgInline,
	templateImages,
	templateOptimize
}