var app = angular.module("browseApp.newsub", []);


app.controller('permissions', function($scope, $http, $stateParams) {

  $http.get("reqs/check/")
    .success(function(response)
      {

          $scope.cats = response;

      });




});

app.controller('newSubmission',function($scope) {






});

app.controller('newFormCtrl',function($scope) {






});

app.controller('newFormDisplay',function($scope) {

        $scope.display = function(type) {

            console.log(type);



        };

});

app.controller('newFormSelect',function($scope, $http) {

      $http.get("reqs/types/showall")
      .success(function(response){

        $scope.types = response;
        
      });
});
