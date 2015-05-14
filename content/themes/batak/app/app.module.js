"use strict";

angular.module('batakApp', ['ngAnimate', 'ui.router', 'ngSanitize'])
    .config(['$locationProvider', function($locationProvider) {
        // check if browser supports history API
        if(window.history && window.history.pushState){
            $locationProvider.html5Mode(true).hashPrefix('!');
        }
    }])
    .factory('Preload', function() {
        return {
            toSplash: true
        };
    });