var app = angular.module("browseApp.sidebar", []);

app.controller("sidebar",function($scope, $state, $http, $stateParams){


$scope.goToState = function(name){$state.go(name)};

$scope.reloadPage = function(){window.location.reload();};

$scope.joinCategory = function()
              {

                $http.get("join/cat/" + $stateParams.catID)
                  .success(function(response)
                    {
                      console.log(response);
                    });
              }


});
