
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
        controller: 'controller_l',
    })

    .state('list.searchbox',{
      url: '/search',
      views: {
            'searchbox' : {
                templateUrl: 'templates/list.search.html',
                controller: 'searchbox'
              }
        }
    })

    .state('list.newbox',{
      url: '/new/',
      views: {
            'newbox' : {
                templateUrl: 'templates/list.new.html',
                controller: 'newSubmission'
              }
        }
    })

    .state('list.table',{
      views: {
            'table' : {
                templateUrl: 'templates/list.table.html',
                controller: 'workslistCtrl'
              }
        }
    })

    .state('list.addscreen',{
      views: {
              'submitted' : {
                templateUrl: 'templates/list.addscreen.html',
              }
      }
    })

    .state('list.overscreen',{
      views: {
              'approved' : {
                templateUrl: 'templates/list.overscreen.html',
              }
      }
    })

    .state('list.failscreen',{
      views: {
              'fail' : {
                templateUrl: 'templates/list.failscreen.html',
              }
      }
    })

});