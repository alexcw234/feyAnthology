var app = angular.module("browseApp.newsub", []);


app.controller('permissions', function($scope, $http, $stateParams) {

  $http.get("reqs/check/")
    .success(function(response)
      {

          $scope.cats = response;

      });




});

app.controller('newFormdisplay',function($scope){






});

app.controller('typeSelect',function($scope, $http){

      $http.get("reqs/types/showall")
      .success(function(response){

        $scope.types = response;
      });

});

app.controller('newSubmission',function($scope){






});
