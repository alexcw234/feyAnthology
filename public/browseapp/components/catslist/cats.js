var app = angular.module("browseApp.cats", []);


app.controller("myCtrl", function($scope) {

});


app.controller("catstableCtrl", function($scope, $http) {
    $http.get("reqs/cats/showall")
      .success(function(response)
        {
            $scope.cats = response;

        });

});


/*
*   Handles request for current user group to determine
*   what should be displayed.
*/
app.controller("cats_permissionsCtrl", function($scope, $http) {

  $http.get("displaycheck/global")
    .success(function(response)
      {
          userlevel = response.level;

          $scope.level = userlevel;

          $scope.$parent.$parent.sidebar_level = userlevel;

      });

});
