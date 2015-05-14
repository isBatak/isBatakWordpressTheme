angular.module('batakApp')
    .directive('preloader', ['$rootScope', 'Preload', function ($rootScope, Preload) {
        return {
            restrict: 'A',
            replace: true,
            templateUrl: wp_global.template_directory_uri + '/app/shared/preloader/preloaderView.html',
            link: function (scope) {
                scope.toSplash = Preload.toSplash;
            }
        }
    }]);