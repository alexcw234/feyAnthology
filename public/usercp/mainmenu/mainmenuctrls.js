var app = angular.module("userCP.mainmenuctrls", []);

/*
* Sends request for categories table
*
*/
app.controller("catstabledisplayctrl", function($scope, $http) {
    $http.get("reqs/cats/mycats")
      .success(function(response)
        {
            $scope.cats = response;

        });
});
