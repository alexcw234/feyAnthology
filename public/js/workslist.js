var app = angular.module("browseApp.workslist", []);


app.controller("workslistCtrl", function($scope, $http) {

    $http.get("reqs/list/" + $scope.catID)
      .success(function(response)
        {
            console.log("Test");
            $scope.works = response;

        });

});
