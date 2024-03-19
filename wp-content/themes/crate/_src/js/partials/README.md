# Partials Javascript directory #

This directory is meant to serve as a way to breakdown large scripts into smaller ones so that it easier to maintain.

## Example ##

You should manually wrap this code in a module.exports function:

	module.exports = function() {
		/* ORIGINAL CODE GOES HERE */
	};

Then save the file into this directory.

You can now include this script in another script in the \_src/js directory like this:

	var whatever = require( './partials/jquery.whatever.js' );
	whatever();
