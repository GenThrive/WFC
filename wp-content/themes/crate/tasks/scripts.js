'use strict';

import gulp from 'gulp';
import browserify from 'browserify';
import log from 'gulplog';
import tap from 'gulp-tap';
import buffer from 'gulp-buffer';
import uglify from 'gulp-uglify';
import sourcemaps from 'gulp-sourcemaps';
import rename from 'gulp-rename';
import babelify from 'babelify';

import { paths } from './constants';

const scripts = () => {
	return gulp.src(paths.scripts.src, { read: false })
		.pipe(tap(function (file) {
			log.info('bundling ' + file.path);
			file.contents = browserify(file.path, {
				cache: {},
				packageCache: {},
				paths: ['./node_modules', './_src/js/'],
				debug: true
			})
			.transform(babelify.configure({
				presets: ["@babel/preset-env"]
			}))
			.bundle();
		}))
		.pipe(buffer())
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(sourcemaps.write('./maps', { includeContent: false, sourceRoot: '../' }))
		.pipe(gulp.dest(paths.scripts.dest));
};

const scriptsProd = () => {
	return gulp.src(paths.scripts.src, { read: false })
		.pipe(tap(function (file) {
			log.info('bundling ' + file.path);
			file.contents = browserify(file.path, {
				cache: {},
				packageCache: {},
				paths: ['./node_modules', './_src/js/'],
				debug: true
			})
			.transform(babelify.configure({
				presets: ["@babel/preset-env"]
			}))
			.bundle();
		}))
		.pipe(buffer())
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(uglify())
		.pipe(sourcemaps.write('./maps', { includeContent: false, sourceRoot: '../' }))
		.pipe(rename({
			suffix: ".min",
		}))
		.pipe(gulp.dest(paths.scripts.dest));
};

export {
	scripts,
	scriptsProd
}