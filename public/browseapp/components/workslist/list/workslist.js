var app = angular.module("browseApp.workslist", []);

/*
*   Handles sending get request to database with parameters.
*/
app.controller("workslistCtrl", function($scope, $http) {


    var query = '';
    $scope.works = [];

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

              $scope.works[i].shown = true;

              $scope.works[i].featured = $scope.works[i].featured;

            }


        });


    $scope.narrowSearchToInfo = function(field,info)
    {
      for (i in $scope.works)
      {
          if ($scope.works[i].info[field] != info)
          {
            $scope.works[i].shown = false;
          }
      }

    };

    $scope.narrowSearchToTag = function(tag)
    {
      for (i in $scope.works)
      {
        found = false;
        for (j in $scope.works[i].tags)
        {
          if ($scope.works[i].tags[j] == tag)
          {
            found = true;

          }
        }
        if (found == false)
        {
          $scope.works[i].shown = false;
          found = true;
        }
      }

    };

    $scope.callFeature = function(workID)
    {
      result = {};
      result['workID'] = workID;

      $http.post("edit/work/feature", result)
        .success(function(response)
          {
            if (response.status == 'success')
            {
              for (i in $scope.works)
              {
                if ($scope.works[i].workID == workID && $scope.works[i].featured == false)
                {
                  $scope.works[i].featured = true;
                }
              }
            }

          });

    }

    $scope.callUnfeature = function(workID)
    {
      console.log('click');
      result = {};
      result['workID'] = workID;
      $http.post("edit/work/unfeature", result)
        .success(function(response)
          {

            if (response.status == 'success')
            {
                for (i in $scope.works)
                {
                  if ($scope.works[i].workID == workID && $scope.works[i].featured == true)
                  {
                    $scope.works[i].featured = false;
                  }
                }
            }

          });


    }



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
