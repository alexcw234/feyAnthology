var app = angular.module('factories.searchqueryFactories', []);


/*
*   Handles the storing and processing of search queries.
*
*   Functions:
*     getQuerystring - returns the encoded query string.
*     resetQuerystring - resets the query string.
*     makeQuerystring - uses the search fields to process a new query string,
*                      stores it in the service.
*
*/
app.factory('searchqueryService', function($http)
{
      var querystring = null;

      var getQuerystring = function()
          {
              if (querystring != null) {
                  return '?' + encodeURI(querystring);
              }
              else
              {
                  return '';
              }
          };

      var resetQuerystring = function()
          {
              querystring = null;
          };

      var newQuerystring = function(infojson, tagarray)
          {
              var result = '';

              for (key in infojson) {

                result += key + '=' + infojson[key] + '&';

              }
                result += 'tags' + '=';

              for (i in tagarray) {

                tagjson = tagarray[i];

                for (key in tagjson) {

                  result += tagjson[key] + ',';
                }
              }

              querystring = result;

          };

      return {
              getQuerystring : getQuerystring,
              resetQuerystring : resetQuerystring,
              newQuerystring : newQuerystring,
             };
});
