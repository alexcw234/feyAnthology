var app = angular.module('factories.catlistFactories', []);

/*
*   Loads table of category data
*/
app.factory('catlistLoaderService', function($http)
{

      /*
      *   Loads table of category data
      */
      var getCategoryListing = function()
          {
              return $http.get("reqs/cats/showall")
                     .then(function(response)
                     {
                       return response.data;
                     });
          }

      return {
              getCategoryListing : getCategoryListing
             };
});
