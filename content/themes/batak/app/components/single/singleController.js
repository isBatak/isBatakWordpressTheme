angular.module('batakApp')
    .controller('SingleController', [ '$scope', 'loadPost', function ($scope, loadPost) {
        $scope.post = loadPost[0];
}]);