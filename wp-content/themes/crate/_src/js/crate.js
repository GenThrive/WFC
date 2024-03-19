'use strict';

var $ = require('jQuery');

/**
 * Search Toggle
 */
function openSearch() {
	$(this).addClass('toggled-on');
	$('.search-container, .search-container .search-toggle').addClass('toggled-on');
	$(this).one('click', closeSearch);
}

function closeSearch() {
	$(this).removeClass('toggled-on');
	$('.search-container, .search-container .search-toggle').removeClass('toggled-on');
	$(this).one('click', openSearch);
}

$('#open-search').one('click', openSearch);

$('#close-search').on('click', function() {
	$('#open-search').click();
});


/**
 * Mobile Menu Toggle
 */
function openMenu() {
	$(this).addClass('toggled-on');
	$('.site-header').addClass('toggled-on');
	$(this).one('click', closeMenu);
}

function closeMenu() {
	$(this).removeClass('toggled-on');
	$('.site-header').removeClass('toggled-on');
	$(this).one('click', openMenu);
}

$('.menu-toggle').one('click', openMenu);


//! Add external attr to PDF links and downloads
$('.sdm_download, [href$="pdf"]').attr({
	'data-wpel-link': 'external',
	target: '_blank',
	rel: 'nofollow external noopener noreferrer',
});
