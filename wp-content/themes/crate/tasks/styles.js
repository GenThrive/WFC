'use strict';

import gulp from 'gulp';
// import sass from 'gulp-sass';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass( dartSass );
import postcss from 'gulp-postcss';
import short from 'postcss-short';
import sorting from 'postcss-sorting';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';

import { paths, browserSync } from './constants';

console.log(paths.styles.src);

// PostCSS Processors
const processors = [
	short,
	sorting,
	autoprefixer
];

const processorsProd = [
	short,
	sorting,
	autoprefixer,
	cssnano({
		zindex: false // Don't change z-index values when minifying!
	})
];

// Compile Styles for Dev
const styles = () => {
	return gulp.src(paths.styles.src)
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss(processors))
		.pipe(sourcemaps.write('./maps', { includeContent: false, sourceRoot: '/_src/scss' }))
		.pipe(gulp.dest(paths.styles.dest))
		.pipe(browserSync.stream({ match: '**/*.css' }));
}

// Compile Styles for Production
const stylesProd = () => {
	return gulp.src(paths.styles.src)
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss(processorsProd))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(paths.styles.dest));
}

export {
	styles,
	stylesProd
}