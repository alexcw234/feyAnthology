
var app = angular.module("browseApp.routes", ['ui.router']);


app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider

    .when('/list','works')

    .otherwise('/categories');


    $stateProvider

    .state('allcats',{
        url: '/categories',
        templateUrl: 'templates/catlist.html'
    })

    .state('works',{
        url: '/list',
        templateUrl: 'templates/worklist.html'
    });


});
