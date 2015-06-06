<html ng-app="batakApp">
    <head>
        <base href="<?php echo get_template_directory_uri(); ?>">
        <title></title>



        <script type="text/javascript">
            /*
            angular.module('app', ['ngRoute'])
            .config(function($routeProvider, $locationProvider) {
                $locationProvider.html5Mode({
                    enabled: true,
                    requireBase: true
                });

                $routeProvider
                .when('/', {
                    templateUrl: '<?php echo get_template_directory_uri(); ?>/views/main.html',
                    controller: 'Main'
                })
                .when('/:slug', {
                    templateUrl: '<?php echo get_template_directory_uri(); ?>/views/demo.html',
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
            */
            var wp_global = {
              template_directory_uri:   '<?php echo get_template_directory_uri(); ?>'
            };
        </script>
    </head>
    <body>

        <div ui-view> </div>

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/angular/angular.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/angular-ui-router/release/angular-ui-router.min.js"></script>

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/app.module.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/app.states.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/home/homeController.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/home/homeService.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/blog/blogController.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/app/components/blog/blogService.js"></script>

        <script src="http://localhost:35729/livereload.js"></script>
    </body>
</html>
