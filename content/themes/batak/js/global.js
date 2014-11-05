require.config({
	"baseUrl": "content/themes/batak/js",
	"paths": {
		"jquery": "vendor/jquery/jquery"
	}
});

require(['jquery'], function($) {
	console.log('Working!!');
});
