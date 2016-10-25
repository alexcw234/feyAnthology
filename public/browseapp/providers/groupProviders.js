var app = angular.module('providers.groupProviders', []);

app.provider('usergroup', function()
{
    this.viewingGroupGlobal = "None";
    this.viewingLevelGlobal = null;
    this.viewingGroupCat = "None";
    this.viewingLevelCat = null;


    this.$get = function() {
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


        return {
            viewingGroup: function(netGroup, netLevel) {
                role = {};
                role['viewingGroup'] = netGroup;
                role['viewingLevel'] = netLevel;
                return role;
            }
        };
    };


    this.setglobalView = function() {

      $http.get("displaycheck/global")
      .success(function(response)
      {
          this.viewingGroupGlobal = response.groupName;
          this.viewingLevelGlobal = response.level;

      });

    };

    this.setcatView = function(catID) {

      $http.get("displaycheck/group/" + $scope.catID)
        .success(function(response)
          {
            this.viewingGroupCat = response.groupName;
            this.viewingLevelCat = response.level;
          });
    };


});
