var blogCtrl = angular.module('batakApp')
    .controller('blogCtrl', [ '$scope', '$q', 'Preload', 'loadPosts', function ($scope, $q, Preload, loadPosts) {

        $scope.title = "Blog";

        /*
        Posts.get().then(function(data) {
            $scope.posts = data;
            Preload.toSplash = false;
        });
        */

        $scope.posts = loadPosts;

        /*
        var defer = $q.defer();

        defer.promise
            .then(function(){
                alert('test');
            });

        defer.resolve();
        */

    }]);

blogCtrl.loadData = function ($q, $timeout) {
    var defer = $q.defer();
    $timeout(function() {
        defer.resolve("data loaded");

    }, 3000);

    return defer.promise;
}