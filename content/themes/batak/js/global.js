require.config({
	"baseUrl": "content/themes/batak/lib",
	"paths": {
		"jquery": "/jquery/jquery",
		"bootstrap": "/bootstrap-sass-official/assets/javascripts/bootstrap"
	}
});

require(['jquery', 'bootstrap'], function($) {
	console.log('Working!!');
});
