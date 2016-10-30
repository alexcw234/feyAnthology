var app = angular.module("browseApp",

// browseApp dependancies
  [
    'ui.bootstrap',
    'browseApp.routes',
    'browseApp.mainctrls',
    'browseApp.cats',
    'browseApp.newsub',
    'browseApp.workslist',
    'browseApp.search',
    'browseApp.sidebar',
    'browseApp.moderation',
    'angularUtils.directives.dirPagination',
    'providers.groupProviders',
    'providers.locationProviders',
    'factories.catlistFactories',
  ]);


app.config(function(usergroupProviderProvider, locationTrackerProvider)
{

});
