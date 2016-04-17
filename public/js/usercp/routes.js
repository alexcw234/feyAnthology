var app = angular.module("userCP.routes", ['ui.router']);

/*
* Configurations for states for ui-router. Controllers refer to
* the controllers located in mainctrls.js.
*
*/
app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider

    .otherwise('/menu');

    $stateProvider

    .state('menu',{
        url: '/menu',
        templateUrl: 'usercp/usermenu.html',
        controller: 'controller_m',
    })

    .state('mod',{
        url: '/mod',
        templateUrl: 'usercp/pendinglist.html',
        controller: 'controller_p',
    })

    .state('mod.one',{
      url: '/:workID',
      views: {
            'entry' : {
                templateUrl: 'usercp/pendinglist.entry.html',
                controller: 'entry',
              }
        }
    })

});
