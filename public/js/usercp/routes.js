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

// Edit profile
    .state('editprofile',{
        url: '/editprofile',
        templateUrl: 'usercp/cpforms/cp_profileedit.html',
        controller: 'editprofilectrl',
    })

// Shows categories where I am a contributor
    .state('controls',{
        url: '/controls',
        templateUrl: 'usercp/cptables/cp_mycatstable.html',
        controller: 'mycatstemplatectrl',
    })
        .state('controls.menus', {
          views : {
                'useroptions' : {
                    templateUrl: 'usercp/cpmenus/cp_usermenu.html',
                    controller: 'useroptionsctrl',
                },
                'modoptions' : {
                    templateUrl: 'usercp/cpmenus/cp_modmenu.html',
                    controller: 'modoptionsctrl',
                }
            }
        })


// Mod menu
    .state('modops',{
        url: '/controls/:catID',
        templateUrl: 'usercp/cpmenus/cp_modmenu.html',
        controller: 'modmenuctrl',
    })

        .state('modops.actions',{
          url: '/actions',
          views: {
                'actionlog' : {
                    templateUrl: 'usercp/cptables/cp_actionlogtable.html',
                    controller: 'actionlogctrl'
                  }
            }
        })

        .state('modops.users',{
          url: '/users',
          views: {
                'userstable' : {
                    templateUrl: 'usercp/cptables/cp_userstable.html',
                    controller: 'userstablectrl'
                  }
            }
        })

        .state('modops.requests',{
          url: '/requests',
          views: {
                'requeststable' : {
                    templateUrl: 'usercp/cptables/cp_pendingrequeststable.html',
                    controller: 'requeststablectrl'
                  }
            }
        })

        .state('modops.submissions',{
          url: '/submissions',
          views: {
                'submissionstable' : {
                    templateUrl: 'usercp/cptables/cp_submissionstable.html',
                    controller: 'submissionstablectrl'
                  }
            }
        })

        .state('modops.reports',{
          url: '/reports',
          views: {
                'reportstable' : {
                    templateUrl: 'usercp/cptables/cp_reportstable.html',
                    controller: 'reportstablectrl'
                  }
            }
          })


});
