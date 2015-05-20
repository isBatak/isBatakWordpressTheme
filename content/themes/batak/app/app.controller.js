angular.module('batakApp')
    .controller('appCtrl', [ '$scope', '$state', '$rootScope', 'Preload', appController]);

function appController($scope, $state, $rootScope, Preload) {

    $rootScope
        .$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams){
            //alert('success');
            if(Preload.toSplash){
                $scope.toSplash = Preload.toSplash = false;
            }
        });
    $rootScope
        .$on('$stateChangeError', function(event, toState, toParams, fromState, fromParams, error){
            console.log(error);
        });

    $scope.toSplash = Preload.toSplash;

}