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

// Default state, shows profile and other stats
    .state('default',{
        url: '/cp',
        templateUrl: 'usercp/default.html',
        controller: 'defaultctrl',
    })

// User menu, shows options at the top and views at the bottom
    .state('usermenu',{
        url: '/usermenu',
        templateUrl: 'usercp/cpmenus/cp_usermenu.html',
        controller: 'usermenuctrl',
        views: {
              'mycats' : {
                  templateUrl: 'usercp/cptables/cp_mycatstable.html',
                  controller: 'mycatstablectrl'
                }
              'profileedit' : {
                  templateUrl: 'usercp/cpforms/cp_profileedit.html',
                  controller: 'profileeditctrl'
                }

          }
    })

    .state('usermenu.submissions',{
      url: '/usermenu/:catID',
      views: {
            'mysubs' : {
                templateUrl: 'usercp/cptables/cp_mysubstable.html',
                controller: 'mysubstablectrl'
              }
        }
    })

// Moderator menu
    .state('modmenu',{
        url: '/modmenu',
        templateUrl: 'usercp/cpmenus/cp_modmenu.html',
        controller: 'modmenuctrl',
        views: {
              'modcats' : {
                  templateUrl: 'usercp/cptables/cp_modcatstable.html',
                  controller: 'modcatstablectrl'
                }
              'profileedit' : {
                  templateUrl: 'usercp/cpforms/cp_profileedit.html',
                  controller: 'profileeditctrl'
                }

    })


});
