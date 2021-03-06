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
    .state('editprofile', {
        url: '/editprofile',
        templateUrl: 'usercp/cpforms/cp_profileedit.html',
        controller: 'editprofilectrl',
    })

// Shows categories where I am a contributor
    .state('mycats',{
        url: '/mycategories',
        templateUrl: 'usercp/mainmenu/cp_mycatstable.html',
        controller: 'mycatsctrl',
      })

    .state('controls',{
        abstract : true,
        templateUrl: 'usercp/controls.html',

    })

        .state('controls.actions',{
          url: '/actions/:catID',
          views: {
                'actionlog' : {
                    templateUrl: 'usercp/cptables/cp_actionlogtable.html',
                    controller: 'actionlogctrl'
                  }
            }
        })

        .state('controls.users',{
          url: '/users/:catID',
          views: {
                'userstable' : {
                    templateUrl: 'usercp/userpages/memberlist/cp_userstable.html',
                    controller: 'userstablectrl'
                  },
                'userstable_search' : {
                    templateUrl: 'usercp/cpforms/cp_userstable_search.html',
                    controller: 'userstablesearchctrl'
                }
            }
        })

        .state('controls.memberprofile',{
          url: '/users?:id',
          views: {
                  'userprofile' : {
                    templateUrl: 'usercp/cpforms/cp_notmyprofile.html',
                    controller: 'memberprofilectrl'
                  }
            }
        })

        .state('controls.requests',{
          url: '/requests/:catID',
          views: {
                'requeststable' : {
                    templateUrl: 'usercp/cptables/cp_pendingrequeststable.html',
                    controller: 'requeststablectrl'
                  }
            }
        })

        .state('controls.submissions',{
          url: '/submissions/:catID',
          views: {
                  'table' : {
                    templateUrl: 'usercp/cptables/cp_pendingsubstable.html',
                    controller: 'submissionstablectrl'
                  },
                  'detail' : {
                    templateUrl: 'usercp/cpforms/cp_subview.html',
                    controller: 'submissionsviewctrl'
                  }
            }
        })

        .state('controls.reports',{
          url: '/reports/:catID',
          views: {
                'reportstable' : {
                    templateUrl: 'usercp/cptables/cp_reportstable.html',
                    controller: 'reportstablectrl'
                  }
            }
          })


          .state('controls.managestaff',{
            url: '/managestaff/:catID',
            views: {
                  'staffmanagermenu' : {
                      templateUrl: 'usercp/managerpages/managestaff/cp_staffmanagerpage.html',
                      controller: 'managestaffctrl'
                    }
              }
            })


            .state('controls.managecategory',{
              url: '/managecategory/:catID',
              views: {
                    'categorymanagermenu' : {
                        templateUrl: 'usercp/managerpages/managecategory/cp_categorymanagerpage.html',
                        controller: 'managecategoryctrl'
                      }
                }
              })

});
