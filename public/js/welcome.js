var app = angular.module("browseApp", []);

app.controller("myCtrl", function($scope) {
    $scope.firstName = "If this is showing,";
    $scope.lastName = "angular is working.";
});


app.controller("tableCtrl", function($scope, $http) {
    $http.get("reqs/test.json")
      .success(function(response)
        {
          $scope.cats = response;
        });
});
