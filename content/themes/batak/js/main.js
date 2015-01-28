require.config({
	baseUrl: "../js",
	paths: {
		jquery: "libs\\jquery\\jquery",
		bootstrap: "libs\\bootstrap\\bootstrap",
	},
	shim: {
		"bootstrap": {
			deps: ["jquery"],
			exports: "$.fn.popover"
		}
	},
	enforceDefine: true
});

require(['jquery', 'bootstrap'], function($) {

	$(function () {
		$('.navbar-toggle').click(function () {
			$('.navbar-nav').toggleClass('slide-in');
			$('.side-body').toggleClass('body-slide-in');
			$('.side-menu .navbar').toggleClass('body-slide-in');
			$('#search').removeClass('in').addClass('collapse').slideUp(200);
		});

		// Remove menu for searching
		$('#search-trigger').click(function () {
			$('.navbar-nav').removeClass('slide-in');
			$('.side-body').removeClass('body-slide-in');
			$('.side-menu .navbar').removeClass('body-slide-in');
		});
	});
});
