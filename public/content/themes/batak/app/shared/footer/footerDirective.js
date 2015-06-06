angular.module('batakApp')
    .directive('test', function () {
        return {
            restrict: 'A',
            replace: true,
            templateUrl: wp_global.template_directory_uri + '/app/shared/footer/footerView.html'

        }
    });