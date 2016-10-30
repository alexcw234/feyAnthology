var app = angular.module('factories.worklistFactories', []);


/*
*   Handles loading of worklist
*
*   Functions:
*     getWorkListing - loads the workslist
*/
app.factory('worklistLoaderService', function($http)
{
      var getWorkListing = function(catID, query)
          {
              return $http.get("reqs/list/" + catID + query)
                     .then(function(response)
                     {
                       return response.data;
                     });
          };

      return {
              getWorkListing : getWorkListing,
             };
});


/*
*   Handles the feature and unfeature buttons
*
*   Functions:
*     callFeature - features the content
*     callUnfeature - unfeatures the content
*/
app.factory('worklistFeatureService', function($http)
{
      var callFeature = function(workID)
          {
              result = {};
              result['workID'] = workID;

              return $http.post("edit/work/feature", result)
                      .then(function(response)
                      {
                        return response.data;
                      });
          };

      var callUnfeature = function(workID)
          {
              result = {};
              result['workID'] = workID;

              return $http.post("edit/work/unfeature", result)
                      .then(function(response)
                      {
                        return response.data;
                      });
          };

      return {
              callFeature : callFeature,
              callUnfeature : callUnfeature,
             };
});
