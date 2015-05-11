"use strict";

angular.module('batakApp', ['ngAnimate', 'ui.router', 'ngSanitize'])
    .config(['$locationProvider', function($locationProvider) {
        $locationProvider.html5Mode(true).hashPrefix('!');
    }]);