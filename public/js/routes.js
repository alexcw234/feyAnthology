var app = angular.module("browseApp", []);

app.controller("myCtrl", function($scope) {
    $scope.firstName = "If this is showing,";
    $scope.lastName = "angular is working.";
});


app.controller("tableCtrl", function($scope, $http) {
    $http.get("reqs/cats/showall")
      .success(function(response)
        {
            console.log("Test");
            $scope.cats = response;

        });

});
