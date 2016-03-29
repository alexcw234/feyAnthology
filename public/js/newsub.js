var app = angular.module("browseApp.newsub", []);


app.controller = ('permissions', function($scope) {

  $http.get("reqs/check/level")
    .success(function(response)
      {
          console.log("Test");
          $scope.cats = response;

      });




});



app.controller = ('newSubmission',function($scope){







});
