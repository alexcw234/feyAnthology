var app = angular.module("browseApp", ['ui.router']);


app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/test');


    $stateProvider

    .state('test',{
        url: 'test',
        templateUrl: 'test'
    });


});
