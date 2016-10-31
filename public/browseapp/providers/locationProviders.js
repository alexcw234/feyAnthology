var app = angular.module('providers.locationProviders', []);

/*
*   Handles keeping track of user location on the app (ie. category list or category).
*   Also loads and stores data on the current category if on category.
*   Functions:
*     setOnCategory - tells provider that user is viewing a category (ie. on the workslist)
*     setOnCatslist - tells provider that user is viewing category listing.
*     getLocation - returns the user's current location details (See note below).
*
*     IMPORTANT: 'location' is a reserved word,
*     so the returned values from this should not be called 'location' (I'm calling it 'loct').
*
*/
app.provider('locationTracker', function()
{
    var sidebar_onCatlist = true;
    var sidebar_backtrack = false;
    var sidebar_title = "Categories";
    var sidebar_text = "Select a category:";
    var cat_ID = null;
    var cat_options = null;
    var hasMatchingType = false;

    this.$get = function($http, typesService) {

        var setOnCategory = function(catID)
        {
          return $http.get("reqs/getcatname/" + catID)
            .then(function(response)
              {
                sidebar_onCatlist = false;
                sidebar_backtrack = true;
                sidebar_title = response.data.catName;
                sidebar_text = response.data.description;
                cat_ID = catID;
                cat_options = JSON.parse(response.data.options);
                hasMatchingType = typesService.checkifhasMatchingType(cat_options.type);
                return response;
              });
        }

        return {
            getLocation: function()
            {
              result = {};
              result['sidebar_onCatlist'] = sidebar_onCatlist;
              result['sidebar_backtrack'] = sidebar_backtrack;
              result['sidebar_title'] = sidebar_title;
              result['sidebar_text'] =  sidebar_text;
              result['catID'] = cat_ID;
              result['catOptions'] = cat_options;
              result['hasMatchingType'] = hasMatchingType;

              return result;

            },
            setOnCatslist: function()
            {
              sidebar_onCatlist = true;
              sidebar_backtrack = false;
              sidebar_title = "Categories";
              sidebar_text = "Select a category:";
              cat_ID = null;
              cat_options = null;
              hasMatchingType = false;
            },
            setOnCategory: setOnCategory,

        };
    };

});
