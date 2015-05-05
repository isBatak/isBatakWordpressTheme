<html ng-app="app">
    <head>
        <base href="/">
        <title></title>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/angular/angular.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/angular-route/angular-route.js"></script>

        <script type="text/javascript">
            angular.module('app', ['ngRoute'])
            .config(function($routeProvider, $locationProvider) {
                $locationProvider.html5Mode({
                    enabled: true,
                    requireBase: true
                });

                $routeProvider
                .when('/', {
                    templateUrl: '<?php echo get_template_directory_uri(); ?>/partials/main.html',
                    controller: 'Main'
                })
                .when('/:slug', {
                    templateUrl: '<?php echo get_template_directory_uri(); ?>/partials/demo.html',
                    controller: 'Content'
                });
            })
            .controller('Main', function($scope, $http, $routeParams) {
                $http.get('/wp-json/posts/').success(function(res) {
                    $scope.posts = res;
                });
            })
            .controller('Content', function($scope, $http, $routeParams) {
                $http.get('/wp-json/posts/?filter[name]=' + $routeParams.slug).success(function(res) {
                    $scope.post = res[0];
                });
            });
        </script>
    </head>
    <body>
        <div ng-view></div>

        <script src="http://localhost:35729/livereload.js"></script>
    </body>
</html>
