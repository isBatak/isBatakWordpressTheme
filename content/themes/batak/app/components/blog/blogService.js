angular.module('batakApp')
    .service('Posts', ['$http', function($http) {
        return {
            get: function() {
                return $http.get('/wp-json/posts/').then(function (response) {
                    return response.data;
                });
            }
        };
    }]);