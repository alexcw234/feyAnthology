var app = angular.module('providers.locationProviders', []);

app.provider('locationTracker', function()
{
    var sidebar_onCatlist = true;
    var sidebar_backtrack = false;
    var sidebar_title = "Categories";
    var sidebar_text = "Select a category:";

    this.$get = function($http) {

        var setOnCategory = function(catID)
        {

          return $http.get("reqs/getcatname/" + catID)
            .then(function(response)
              {
                sidebar_onCatlist = false;
                sidebar_backtrack = true;
                sidebar_title = response.data.catName;
                sidebar_text = response.data.description;

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

              return result;

            },
            setOnCatslist: function()
            {
              sidebar_onCatlist = true;
              sidebar_backtrack = false;
              sidebar_title = "Categories";
              sidebar_text = "Select a category:";
            },
            setOnCategory: setOnCategory,
            toggleBacktrack: function(tf)
            {
              sidebar_backtrack = tf;
            },
        };
    };

});
