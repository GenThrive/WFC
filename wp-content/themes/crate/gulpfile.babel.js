'use strict';

// For documentation on these tasks, visit https://intranet.cshp.co/documentation-gulp/
import gulp from 'gulp';
import { styles, stylesProd } from './tasks/styles';
import { sprite, templateImages, svgStyle, svgInline, screenshot } from './tasks/images';
import { scripts, scriptsProd } from './tasks/scripts';
import { serve } from './tasks/browsersync';
import { clean, cleanProd } from './tasks/clean';

// Compile Task
export const compile = gulp.series(clean, svgInline, svgStyle, gulp.parallel(styles, scripts, sprite, templateImages));

// Development Task
export const dev = gulp.series(compile, serve);

// Build Task
export const build = gulp.series(cleanProd, svgInline, svgStyle, gulp.parallel(stylesProd, scriptsProd, sprite, templateImages, screenshot));

// Default task
export default dev;