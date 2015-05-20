angular.module('batakApp')
    .factory('LoadSinglePostService', ['$http', '$stateParams', function($http) {

        return {

            getPost: function( slug ){
                return $http({method: 'GET', url: '/wp-json/posts?filter[name]=' + slug})
                    .then(function (response) {
                        return response.data;
                    });
            }
        }
    }]);