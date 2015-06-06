angular.module('batakApp')
    .controller('HomeController', [ '$scope', function ($scope) {
        $scope.title = "Home";
        $scope.items = ['home', 'about', 'contact'];
    }]);