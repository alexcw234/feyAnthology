
var app = angular.module("browseApp.routes", ['ui.router']);


app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/test');


    $stateProvider

    .state('teststate',{
        url: '/test',
        templateUrl: 'templates/catpage.html'
    });


});
