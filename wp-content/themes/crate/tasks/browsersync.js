'use strict';

import gulp from 'gulp';
import fs from 'fs';
import del from 'del';
import { paths, userPath, browserSync, browserSyncPort } from './constants';
import { watch } from './watch';

const inject = () => {
	fs.writeFileSync(paths.phpconfig, '<?php define( "BROWSERSYNC_PORT", ' + browserSyncPort + ' );');
}

// BrowserSync Task
const serve = () => {
	browserSync.init({
		host: userPath[4] + '.' + userPath[2] + '.cshp.co',
		proxy: {
			target: userPath[4] + '.' + userPath[2] + '.cshp.co',
		},
		open: false,
		ui: false,
		port: browserSyncPort,
		ghostMode: false,
		https: {
			key: '/etc/apache2/ssl/letsencrypt.cshp.co-key.pem',
			cert: '/etc/apache2/ssl/letsencrypt.cshp.co.pem'
		},
	},
	() => {
		inject();
		watch();
	}
	);
}

export {
	serve
}