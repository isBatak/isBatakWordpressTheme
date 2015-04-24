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

		/* Search */
		$('a[href="#search"]').on('click', function(event) {
	        event.preventDefault();
	        $('#search').addClass('open');
	        $('#search > form > input[type="search"]').focus();
	    });

	    $('#search, #search button.close').on('click keyup', function(event) {
	        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
	            $(this).removeClass('open');
	        }
	    });


	    //Do not include! This prevents the form from submitting for DEMO purposes only!
	    $('form').submit(function(event) {
	        event.preventDefault();
	        return false;
	    });
		/* End Search */
	});
});
