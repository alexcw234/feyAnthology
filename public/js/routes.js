
var app = angular.module("browseApp.routes", ['ui.router']);


app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider

    .otherwise('/categories');


    $stateProvider

    .state('allcats',{
        url: '/categories',
        templateUrl: 'templates/catlist.html',
        controller: 'controller_c'
    })

    .state('list',{
        url: '/list/:catID',
        templateUrl: 'templates/list.html',
        controller: 'controller_l'
    })

    .state('new',{
        url: '/new/:catID',
        templateUrl: 'templates/new.html',
        controller: 'controller_n'
    });

});
