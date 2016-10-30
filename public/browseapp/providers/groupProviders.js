var app = angular.module('providers.groupProviders', []);

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
