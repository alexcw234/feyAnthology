var app = angular.module("browseApp.workslist", []);

/*
*   Handles sending get request to database with parameters.
*/
app.controller("workslistCtrl", function($scope, $http) {


    var query = '';

    if ($scope.querystring != null) {
        query += '?' + encodeURI($scope.querystring);
    }


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

/*
*   Handles request for current user group to determine
*   what should be displayed.
*/
app.controller("workslist_permissionsCtrl", function($scope, $http) {

  $http.get("displaycheck/group/" + $scope.catID)
    .success(function(response)
      {

          userlevel = response.level;

          $scope.level = userlevel;

          $scope.$parent.$parent.sidebar_level = userlevel;

      });

});



/*
*   URL filter from:
*  http://stackoverflow.com/questions/21623967/how-to-use-ng-href-with-absolute-url/27546112
*/
'use strict';
app.filter("urlFilter", function () {
return function (link) {
    var result;
    var startingUrl = "http://";
    var httpsStartingUrl = "https://";
    if(link.startWith(startingUrl)||link.startWith(httpsStartingUrl)){
        result = link;
    }
    else {
    result = startingUrl + link;
    }
    return result;
}
});
String.prototype.startWith = function (str) {
return this.indexOf(str) == 0;
};
