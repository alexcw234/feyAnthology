var app = angular.module("browseApp.cats", []);

/*
* Initial controller for the category state.
*
*/
app.controller("controller_c", function($scope, locationTracker) {
    locationTracker.setOnCatslist();
});

/*
* Displays the header.
* (yeah it's not doing much but it was one of the first controllers I made
* while I was learning Angular so I'm keeping it)
*/
app.controller("header", function($scope){
    $scope.header = "Select a category:";
});

/*
* Loads category list data.
*
*/
app.controller("catstableCtrl", function($scope, catlistLoaderService) {

    catlistLoaderService.getCategoryListing()
    .then(function(cats)
    {
        $scope.cats = cats;
    })
    .catch(function()
    {
      $scope.error = "Unable to load categories";
    });
});

/*
*   Handles request for current user group to determine
*   what should be displayed.
*/
app.controller("cats_permissionsCtrl", function($scope, $http, usergroupProvider) {

      viewingGroup = usergroupProvider.getviewingGroup();
      $scope.level = viewingGroup.level;
});
