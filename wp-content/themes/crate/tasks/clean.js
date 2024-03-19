'use strict';

import del from 'del';
import { paths } from './constants';

// Clean Task
const clean = () => {
	return del([
		'css/*',
		'!css/*.min.css',
		'js/*',
		'!js/*.min.js',
		'!js/*.min.js.map'
	]);
}

// Clean Task for Prod
const cleanProd = () => {
	return del([
		'css/*.min.css',
		'js/*.min.js',
		'js/*.min.js.map'
	]);
}

// Clean PHP config only
function cleanPhp() {
	return del(paths.phpconfig);
}

export {
	clean,
	cleanProd,
	cleanPhp
}