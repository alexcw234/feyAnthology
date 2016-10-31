var app = angular.module('factories.typesFactories', []);

/*
*   Loads table of category data
*/
app.factory('typesService', function($http)
{
      var typeList;
      var selectedTypeID;

      /*
      *   Loads list of types
      */
      var loadTypeList = function()
          {
              return $http.get("reqs/types/showall")
                     .then(function(response)
                     {
                       typeList = response.data;
                       return response.data;
                     });
          }

      var getTypeList = function()
          {
              return typeList;
          };

      var checkifhasMatchingType = function(type)
      {
          for (i = 0; i < typeList.length; i++)
          {
              if (typeList[i].contentType == type)
              {
                selectedTypeID = typeList[i].typeID;
                return true;
              }
          }
      };

      var setSelectedTypeIDByName = function(typeName)
      {
          for (i = 0; i < typeList.length; i++)
          {
              if (typeList[i].contentType == typeName)
              {
                selectedTypeID = typeList[i].typeID;
                return true;
              }
          }
        };

    var getSelectedTypeID = function()
    {
        return selectedTypeID;
    };


      return {
              loadTypeList : loadTypeList,
              getTypeList : getTypeList,
              checkifhasMatchingType : checkifhasMatchingType,
              getSelectedTypeID : getSelectedTypeID,
              setSelectedTypeIDByName : setSelectedTypeIDByName,
             };
});
