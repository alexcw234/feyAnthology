var app = angular.module('factories.catlistFactories', []);

app.factory('catlistLoaderService', function($http)
{
      var getCategoryListing = function()
          {
              return  $http.get("reqs/cats/showall")
                      .then(function(response)
                      {
                        return response.data;
                      });
          }

      return {
              getCategoryListing : getCategoryListing
             };
});
