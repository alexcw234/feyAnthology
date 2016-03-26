var app = angular.module("browseApp.controllers", []);


app.controller("header", function($scope){
    $scope.header = "Welcome to Fey Anthology!";
});


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
