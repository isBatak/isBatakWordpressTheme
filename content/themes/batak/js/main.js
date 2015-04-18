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
		var menuOverlay = $('#menuOverlay');
		$('#sideMenuToggle').click(function () {
			if(menuOverlay.hasClass('slide-out')){
				menuOverlay.removeClass('slide-out').addClass('slide-in');
			}
			else{
				menuOverlay.removeClass('slide-in').addClass('slide-out');
			}
		});
	});
});
