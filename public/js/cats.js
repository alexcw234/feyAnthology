var app = angular.module("browseApp.cats", []);


app.controller("myCtrl", function($scope) {

});


app.controller("catstableCtrl", function($scope, $http) {
    $http.get("reqs/cats/showall")
      .success(function(response)
        {
            $scope.cats = response;

        });

});
