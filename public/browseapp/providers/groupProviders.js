var app = angular.module('providers.groupProviders', []);

app.provider('usergroupProvider', function()
{
    this.viewingGroupGlobal = "None";
    this.viewingLevelGlobal = null;
    this.viewingGroupCat = "None";
    this.viewingLevelCat = null;


    this.$get = function($http) {

        var setglobalView = function() {

          $http.get("displaycheck/global")
          .then(function(response)
          {
              this.viewingGroupGlobal = response.data.groupName;
              this.viewingLevelGlobal = response.data.level;

          });

        };

        var setcatView = function(catID) {

          $http.get("displaycheck/group/" + catID)
          .then(function(response)
          {
          this.viewingGroupCat = response.data.groupName;
          this.viewingLevelCat = response.data.level;
          });

        };


        return {
            setglobalView: setglobalView,
            setcatView: setcatView,
            getviewingGroup: function() {

              var viewingGroupGlobal = this.viewingGroupGlobal;
              var viewingLevelGlobal = this.viewingLevelGlobal;
              var viewingGroupCat = this.viewingGroupCat;
              var viewingLevelCat = this.viewingLevelCat;
              var netLevel;
              var netGroup;

              if (viewingLevelCat != null)
              {
                if (viewingLevelGlobal < 44 || viewingLevelGlobal >= 77)
                {
                  netLevel = viewingLevelGlobal;
                  netGroup = viewingGroupGlobal;
                }
                else
                {
                  netLevel = viewingLevelCat;
                  netGroup = viewingGroupCat;
                }
              }
              else
              {
                netLevel = viewingLevelGlobal;
                netGroup = viewingGroupGlobal;
              }

              role = {};
              role['viewingGroup'] = netGroup;
              role['viewingLevel'] = netLevel;
              return role;
            }
        };
    };

});
