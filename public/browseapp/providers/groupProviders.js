var app = angular.module('providers.groupProviders', []);


/*
*   Handles keeping track of user permissions (for display purposes only,
*   actual validation is on the backend of course).
*
*   Functions:
*     setglobalView - adds user's global view to provider.
*     setcatView - adds user's category view to provider.
*     getviewingGroup - calculates and returns the user's net group for the category.
*/
app.provider('usergroupProvider', function()
{
    var viewingGroupGlobal = "None";
    var viewingLevelGlobal = null;
    var viewingGroupCat = "None";
    var viewingLevelCat = null;


    this.$get = function($http) {

        var setglobalView = function() {

          return $http.get("displaycheck/global")
          .then(function(response)
          {
              viewingGroupGlobal = response.data.groupName;
              viewingLevelGlobal = response.data.level;
              return response.data;
          });

        };

        var setcatView = function(catID) {

          return $http.get("displaycheck/group/" + catID)
          .then(function(response)
          {
              viewingGroupCat = response.data.groupName;
              viewingLevelCat = response.data.level;
              return response.data;
          });

        };


        return {
            setglobalView: setglobalView,
            setcatView: setcatView,
            getviewingGroup: function() {

              var checkGroupGlobal = viewingGroupGlobal;
              var checkLevelGlobal = viewingLevelGlobal;
              var checkGroupCat = viewingGroupCat;
              var checkLevelCat = viewingLevelCat;
              var netLevel;
              var netGroup;
              if (checkLevelCat != null)
              {
                if (checkLevelGlobal < 44 || checkLevelGlobal >= 77)
                {
                  netLevel = checkLevelGlobal;

                  netGroup = checkGroupGlobal;
                }
                else
                {
                  netLevel = checkLevelCat;
                  netGroup = checkGroupCat;
                }
              }
              else
              {
                netLevel = checkLevelGlobal;
                netGroup = checkGroupGlobal;
              }

              role = {};
              role['viewingGroup'] = netGroup;
              role['viewingLevel'] = netLevel;
              return role;
            }
        };
    };

});
