var app = angular.module("browseApp.workslist", []);


app.controller("workslistCtrl", function($scope, $http) {


    var query = '';

    if ($scope.querystring != null) {
        query += '?' + encodeURI($scope.querystring);
    }
    console.log('Query: ' + query);

    $http.get("reqs/list/" + $scope.catID + query)
      .success(function(response)
        {

            $scope.works = response;

            for (i in $scope.works)
            {
              $scope.works[i].tags = $scope.works[i].tags.slice(1,-1);
              $scope.works[i].tags = $scope.works[i].tags.split(",");

              $scope.works[i].info = JSON.parse($scope.works[i].info);
            }

        });

});
