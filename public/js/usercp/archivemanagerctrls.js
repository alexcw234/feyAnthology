var app = angular.module("userCP.archivemanagerctrls", []);

app.controller("staffmanagerctrl", function($scope, $state, $stateParams, $http){

  /**
  * Gets user level for the category (display purposes only, do actual validation on backend).
  */
  $http.get("check/group/" + $stateParams.catID)
    .success(function(response)
      {
          $scope.level = response.level;
      });


  /**
  * Gets List of staff for this category
  *
  */


  /**
  * Gets List of contributors for this category
  *
  */


});
