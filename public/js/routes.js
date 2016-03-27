
var app = angular.module("browseApp.routes", ['ui.router']);


app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider

    .otherwise('/categories');


    $stateProvider

    .state('allcats',{
        url: '/categories',
        templateUrl: 'templates/catlist.html'
    })

    .state('list',{
        url: '/list',
        templateUrl: 'templates/list.html'
    })

    .state('new',{
        url: '/new',
        templateUrl: 'templates/new.html'
    });

});
