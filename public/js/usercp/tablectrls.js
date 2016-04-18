var app = angular.module("userCP.tablectrls", []);


app.controller("mycatstemplatectrl", function($scope, $state){

});


app.controller("catstableCtrl", function($scope, $http) {
    $http.get("reqs/cats/mycats")
      .success(function(response)
        {
            $scope.cats = response;

        });

});
