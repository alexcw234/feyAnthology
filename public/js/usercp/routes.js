var app = angular.module("userCP.routes", ['ui.router']);

/*
* Configurations for states for ui-router. Controllers refer to
* the controllers located in mainctrls.js.
*
*/
app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider

    .otherwise('/cp');

    $stateProvider

    .state('default',{
        url: '/cp',
        templateUrl: 'usercp/default.html',
        controller: 'defaultcontroller',
    })

    .state('menu',{
        url: '/menu',
        templateUrl: 'usercp/menu.html',
        controller: 'mainmenucontroller',
    })

    .state('menu.userops',{
      url: '/menu/user',
      views: {
            'profileops' : {
                templateUrl: 'usercp/menu.userops.html',
                controller: 'useropsmenucontroller'
              }
        }
    })

    .state('menu.profileops',{
      url: '/menu/profile',
      views: {
            'profileops' : {
                templateUrl: 'usercp/menu.userops.html',
                controller: 'useropsmenucontroller'
              }
        }
    })

});
