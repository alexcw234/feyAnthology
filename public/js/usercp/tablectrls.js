var app = angular.module("userCP.tablectrls", []);






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


app.controller("submissionstablectrl", function($scope, $state, $stateParams, $http){


console.log("TEST");

});
