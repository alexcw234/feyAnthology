
var app = angular.module("browseApp.routes", ['ui.router']);


app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/categories');


    $stateProvider

    .state('categories',{
        url: '/categories',
        templateUrl: 'templates/catlist.html'
    })

    .state('works',{
        url: '/works',
        templateUrl: 'templates/worklist.html'
    });


});
