var app = angular.module("browseApp.cats", []);


app.controller("myCtrl", function($scope) {

});


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
app.controller("cats_permissionsCtrl", function($scope, $http, usergroup) {

          viewingGroup = usergroup.getviewingGroup();

          $scope.level = viewingGroup.level;

          $scope.$parent.$parent.sidebar_level = viewingGroup.level;



});
