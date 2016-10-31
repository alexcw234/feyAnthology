var app = angular.module("browseApp.sidebar", []);

app.controller("sidebar",function($scope, $state, $stateParams, $http, locationTracker, usergroupProvider){


      $scope.$watch( function() {return locationTracker.getLocation();},
      function(loct)
      {
            $scope.sidebar_backtrack = loct['sidebar_backtrack'];
            $scope.sidebar_onCatlist = loct['sidebar_onCatlist'];
            $scope.sidebar_title = loct['sidebar_title'];
            $scope.sidebar_text = loct['sidebar_text'];
      }, true);


      $scope.$watch( function() {return usergroupProvider.getviewingGroup();},
      function(role)
      {
            $scope.sidebar_level = role['viewingLevel'];

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
