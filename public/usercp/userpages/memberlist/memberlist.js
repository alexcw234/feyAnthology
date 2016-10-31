var app = angular.module("userCP.memberlist", []);



app.controller("userstablectrl", function($scope, $state, $stateParams, $http){

  $http.get("reqs/users/" + $stateParams.catID)
    .success(function(response)
      {

        $scope.users = response;

      });

});
