var app = angular.module("browseApp.newsub", []);


app.controller('permissions', function($scope, $http, $stateParams) {

  $http.get("reqs/check/")
    .success(function(response)
      {
          console.log("Test");
          $scope.cats = response;

      });




});

app.controller('newSubmission',function($scope){


console.log("NEW");




});
