var app = angular.module("browseApp.workslist", []);

/*
* Initial controller for the works list state.
*
*/
app.controller("controller_l", function($scope, $state, $stateParams, $http, locationTracker, usergroupProvider) {

    $scope.catID = $stateParams.catID;

    locationTracker.setOnCategory($stateParams.catID)
    .then(function(response)
    {
        $scope.catInfo = response.data;
        $scope.catOptions = JSON.parse(response.data.options);

    })
    .catch(function()
    {
        $scope.iniError = "Error loading sidebar content.";
    });

    $scope.goToState = function(name)
    {
        $state.go(name);
    };

});

/*
*   Handles request for current user group to determine
*   what should be displayed.
*/
app.controller("workslist_permissionsCtrl",
    function($scope, $state, $stateParams, usergroupProvider) {

    usergroupProvider.setcatView($stateParams.catID)
    .then(function(response)
    {
        viewingGroup = usergroupProvider.getviewingGroup();
        $scope.level = viewingGroup['viewingLevel'];
        $state.go('list.table');
    })
    .catch(function()
    {
        $scope.iniError = "Error loading group permissions.";
    });

});

/*
*   Handles sending get request to database with parameters.
*/
app.controller("workslistCtrl",
    function($scope, $http, worklistLoaderService, worklistFeatureService,
            searchqueryService) {

    var query = searchqueryService.getQuerystring();
    $scope.works = [];

    worklistLoaderService.getWorkListing($scope.catID, query)
    .then(function(response)
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
    })
    .catch(function()
    {
      $scope.error = "Unable to load works";
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
      worklistFeatureService.callFeature(workID)
      .then(function(response)
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
      })
      .catch(function()
      {
          $scope.error = "Error in featuring content.";
      });
    };

    $scope.callUnfeature = function(workID)
    {
      worklistFeatureService.callUnfeature(workID)
      .then(function(response)
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
      })
      .catch(function()
      {
          $scope.error = "Error in unfeaturing content";
      });
    };


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
