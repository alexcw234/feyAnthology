
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
        templateUrl: 'browseapp/components/catslist/catlist.html',
        controller: 'controller_c'
    })

    .state('list',{
        url: '/list/:catID',
        templateUrl: 'browseapp/components/workslist/list.html',
        controller: 'controller_l',
    })


    .state('list.searchbox',{
      url: '/search',
      views: {
            'searchbox' : {
                templateUrl: 'browseapp/components/workslist/search/list.search.html',
                controller: 'searchbox'
              }
        }
    })

    .state('list.newbox',{
      url: '/new/',
      views: {
            'newbox' : {
                templateUrl: 'browseapp/components/workslist/new/list.new.html',
                controller: 'newSubmission'
              }
        }
    })

    .state('list.editbox',{
      url: '/edit/:workID',
      views: {
          'editbox' : {
              templateUrl: 'browseapp/components/workslist/moderate/list.edit.html',
              controller: 'editSubmission'
          }
      }


    })

    .state('list.table',{
      views: {
            'table' : {
                templateUrl: 'browseapp/components/workslist/list/list.table.html',
                controller: 'workslistCtrl'
              }
        }
    })

    .state('list.addscreen',{
      views: {
              'submitted' : {
                templateUrl: 'browseapp/components/workslist/response/list.addscreen.html',
              }
      }
    })

    .state('list.overscreen',{
      views: {
              'approved' : {
                templateUrl: 'browseapp/components/workslist/response/list.overscreen.html',
              }
      }
    })

    .state('list.failscreen',{
      views: {
              'failure' : {
                templateUrl: 'browseapp/components/workslist/response/list.failscreen.html',
              }
      }
    })



    .state('list.editscreen',{
        views: {
              'edited' : {
              templateUrl: 'browseapp/components/workslist/response/list.editscreen.html',
              }
          }
      })


      .state('list.deletescreen',{
          views: {
                'deleted' : {
                templateUrl: 'browseapp/components/workslist/response/list.deletescreen.html',
                }
            }
        })


});
