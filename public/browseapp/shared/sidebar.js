var app = angular.module("browseApp.sidebar", []);

app.controller("sidebar",function($scope, $state, $stateParams, locationTracker){


      $scope.$watch( function() {return locationTracker.getLocation();},
      function(location)
      {

            $scope.sidebar_backtrack = location['sidebar_backtrack'];
            $scope.sidebar_onCatlist = location['sidebar_onCatlist'];
            $scope.sidebar_title = location['sidebar_title'];
            $scope.sidebar_text = location['sidebar_text'];
      }, true);



$scope.goToState = function(name)
{

  $state.go(name);

};

$scope.reloadPage = function(){window.location.reload();};

$scope.joinCategory = function()
              {

                $http.get("join/cat/" + $stateParams.catID)
                  .success(function(response)
                    {

                    });
              }


});
