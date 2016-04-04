
var app = angular.module("browseApp.routes", ['ui.router']);

/*
* Configurations for states for ui-router. Controllers refer to
* the controllers located in mainctrls.js.
*
*/
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

    .state('list.container',{
      url: '/container',
      views: {
            'searchbox' : {
                templateUrl: 'templates/list.search.html',
                controller: 'searchbox'
              },
            'newbox' : {
                  templateUrl: 'templates/list.search.html',
                  controller: 'searchbox'
                  }
        }
    })

    .state('new',{
        url: '/new/:catID',
        templateUrl: 'templates/new.html',
        controller: 'controller_n'
    });

});
