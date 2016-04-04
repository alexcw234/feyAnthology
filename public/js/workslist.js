var app = angular.module("browseApp.workslist", []);


app.controller("workslistCtrl", function($scope, $http) {
console.log('Passed string ' + $scope.querystring);

    var query = '';

    if ($scope.querystring != null) {
        query += '?' + $scope.querystring;
    }
    console.log('query: ' + query);

    $http.get("reqs/list/" + $scope.catID + query)
      .success(function(response)
        {

            $scope.works = response;

        });

});
