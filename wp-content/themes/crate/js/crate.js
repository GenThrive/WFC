(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
(function (global){
'use strict';

var $ = (typeof window !== "undefined" ? window['jQuery'] : typeof global !== "undefined" ? global['jQuery'] : null);
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
$('#close-search').on('click', function () {
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

$('.menu-toggle').one('click', openMenu); //! Add external attr to PDF links and downloads

$('.sdm_download, [href$="pdf"]').attr({
  'data-wpel-link': 'external',
  target: '_blank',
  rel: 'nofollow external noopener noreferrer'
});

}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})

},{}]},{},[1])

//# sourceMappingURL=maps/crate.js.map
