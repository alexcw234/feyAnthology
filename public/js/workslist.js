var app = angular.module("browseApp.workslist", []);


app.controller("workslistCtrl", function($scope, $http) {


    var query = '';

    if ($scope.querystring != null) {
        query += '?' + $scope.querystring;
    }
    console.log('Query: ' + query);

    $http.get("reqs/list/" + $scope.catID + query)
      .success(function(response)
        {

            $scope.works = response;

        });

});
