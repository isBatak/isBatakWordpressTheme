angular.module('batakApp')
    .service('LoadPostsService', ['$http', function($http) {

        return $http({method: 'GET', url: '/wp-json/posts/'})
            .then (function (response) {
                return response.data;
        });

    }]);