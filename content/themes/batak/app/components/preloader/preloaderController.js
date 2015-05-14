angular.module('batakApp')
    .controller('appCtrl', [ '$scope', 'Preloader', appController]);

function appController($scope, Preloader) {
    $scope.preloading = Preloader.toPreload;
}