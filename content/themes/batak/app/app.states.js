angular.module('batakApp')
    .config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {

        $stateProvider
            .state('home', {
                url: '/',
                templateUrl: wp_global.template_directory_uri + '/app/components/home/homeView.html',
                controller: 'homeCtrl'
            })
            .state('blog', {
                url: '/blog',
                templateUrl: wp_global.template_directory_uri + '/app/components/blog/blogView.html',
                controller: 'blogCtrl',
                resolve: {
                    loadPosts: 'LoadPostsService'
                }
            });

        $urlRouterProvider.otherwise('/');
    }]);