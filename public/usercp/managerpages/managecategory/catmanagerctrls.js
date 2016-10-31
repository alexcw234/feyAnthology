var app = angular.module("userCP.catmanagerctrls", []);

app.controller("managecategoryctrl", function($scope, $state, $stateParams, $http){

    $scope.settings = {};

  /**
  * Gets user level for the category (display purposes only, do actual validation on backend).
  */
  $http.get("displaycheck/group/" + $stateParams.catID)
    .success(function(response)
      {
          $scope.level = response.level;
          if ($scope.level >= 77)
          {
              $http.get("reqs/getcatname/" + $stateParams.catID)
              .success(function(response)
              {
                  $scope.settings.catName = response.catName;
                  $scope.settings.catDescription = response.description;
              });
          }
      });


      $scope.change = function()
      {

        settings = $scope.settings;
        $http.post("save/settings/" + $stateParams.catID, settings)
          .success(function(response)
            {
                $state.go('mycats');
            });
      }

      $scope.back = function()
      {
        $state.go('mycats');
      }

});
