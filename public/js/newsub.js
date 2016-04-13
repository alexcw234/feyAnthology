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

        $scope.newForm;
          var templatename = type;

          if (templatename != null)
          {

          $scope.newForm = "forms/" + templatename.toLowerCase() + ".html";

          }
          else
          {
          $scope.newForm = "forms/noselection.html";
          }

        };



});

app.controller('newFormSelect',function($scope, $http) {

      $http.get("reqs/types/showall")
      .success(function(response){

        $scope.types = response;

      });
});
