angular.module('batakApp')
    .controller('blogCtrl', [ '$scope', 'Posts', function ($scope, Posts) {
        $scope.title = "Blog";
        Posts.get().then(function(data) {
            $scope.posts = data;
        });
    }]);