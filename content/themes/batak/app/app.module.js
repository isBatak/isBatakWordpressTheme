"use strict";

var app = angular.module('batakApp', ['angular-loading-bar', 'ngAnimate', 'ui.router', 'ngSanitize'])
    .config(['$locationProvider', function($locationProvider) {
        // check if browser supports history API
        if(window.history && window.history.pushState){
            $locationProvider.html5Mode({
                enabled : true,
                requireBase: false
            }).hashPrefix('!');
        }
    }])
    .factory('Preload', function() {
        return {
            toSplash: true
        };
    });

// -------------------------------------------------- //
// -------------------------------------------------- //


// Since we cannot change the actual speed of the HTTP request over the wire,
// we'll alter the perceived response time be hooking into the HTTP interceptor
// promise-chain.
app.config(
    function simulateNetworkLatency($httpProvider) {
        return;

        $httpProvider.interceptors.push(httpDelay);


        // I add a delay to both successful and failed responses.
        function httpDelay($timeout, $q) {

            var delayInMilliseconds = 5000;

            // Return our interceptor configuration.
            return ({
                response: response,
                responseError: responseError
            });


            // ---
            // PUBLIC METHODS.
            // ---


            // I intercept successful responses.
            function response(response) {

                var deferred = $q.defer();

                $timeout(
                    function () {

                        deferred.resolve(response);

                    },
                    delayInMilliseconds,
                    // There's no need to trigger a $digest - the view-model has
                    // not been changed.
                    false
                );

                return ( deferred.promise );

            }


            // I intercept error responses.
            function responseError(response) {

                var deferred = $q.defer();

                $timeout(
                    function () {

                        deferred.reject(response);

                    },
                    delayInMilliseconds,
                    // There's no need to trigger a $digest - the view-model has
                    // not been changed.
                    false
                );

                return ( deferred.promise );

            }

        }

    }
);