'use strict';

import gulp from 'gulp';
import { paths, browserSync } from './constants';
import { styles } from './styles';
import { scripts } from './scripts';
import { media, sprite, templateOptimize, templateImages, svg } from './images';

// Watch functions
const watch = () => {
	let reload = browserSync.reload;
	let scriptSeries = gulp.series(scripts, reload );
	let watchScripts = gulp.watch(paths.scripts.src, { awaitWriteFinish: true });
	let watchHtml = gulp.watch(paths.html.src);
	let watchMedia = gulp.watch(paths.imgs.media, { awaitWriteFinish: true });
	let watchTemplate = gulp.watch(paths.imgs.template, { awaitWriteFinish: true });
	let watchSprite = gulp.watch(paths.sprite.src, { awaitWriteFinish: true });
	let watchImages = gulp.watch(paths.imgs.template, { awaitWriteFinish: true });
	let watchSVG = gulp.watch(paths.svgs.src, { awaitWriteFinish: true });
	gulp.watch(paths.styles.src, styles);
	watchSprite.on('add', sprite);
	watchImages.on('add', templateOptimize);
	watchSVG.on('add', svg);
	watchScripts.on('add', scriptSeries);
	watchScripts.on('change', scriptSeries);
	watchHtml.on('add', reload);
	watchHtml.on('change', reload);
	watchHtml.on('unlink', reload);
	watchMedia.on('add', media);
	watchTemplate.on('add', templateImages);
}

export {
	watch
}