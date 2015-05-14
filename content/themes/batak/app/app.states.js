angular.module('batakApp')
    .config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {

        $stateProvider
            .state('home', {
                url: '/',
                templateUrl: wp_global.template_directory_uri + '/app/components/home/homeView.html',
                controller: 'HomeController as HC'
            })
            .state('blog', {
                url: '/blog',
                templateUrl: wp_global.template_directory_uri + '/app/components/blog/blogView.html',
                controller: 'BlogController as BC',
                resolve: {
                    loadPosts: 'LoadPostsService'
                }
            });

        $urlRouterProvider.otherwise('/');
    }]);