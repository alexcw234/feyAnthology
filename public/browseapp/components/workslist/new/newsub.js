var app = angular.module("browseApp.newsub", ['ngTagsInput']);

/*
* Main controller for the new entry state.
*
*/
app.controller("controller_n", function($scope, $stateParams) {

    $scope.$parent.header = "Submit something new";
    $scope.catID = $stateParams.catID;

});

app.controller('newSubmission',function($scope, $http) {



});

app.controller('newFormCtrl',function($scope, $http, $state, locationTracker,typesService) {

    $scope.newentry = {};

    $scope.submitEntry = function(tags) {

        var infojson = $scope.newentry;
        var tagarray = tags;

        var result = {};

        loct = locationTracker.getLocation();
        result['catID'] = loct['catID'];
        result['typeID'] = typesService.getSelectedTypeID();

        for (key in infojson) {

          result[key] = encodeURIComponent(infojson[key]);
        }

        result['tags'] = tagarray;

        $http.post("submission/new", result)
          .success(function(response)
            {

              if (response.status == 'success')
              {
                  $state.go('list.addscreen');
              }
              else if (response.status == 'override')
              {
                  $state.go('list.overscreen');
              }
              else if (response.status == 'failure')
              {
                  $state.go('list.failscreen');
              }

            });

    };

});

app.controller('newFormSelect',function($scope, $http, locationTracker, typesService) {

      //gets $scope.types: list of types from database for select field.
      $scope.types = typesService.getTypeList();

      //Loads the name of the type assigned to this category.
      loct = locationTracker.getLocation();

      if (loct['hasMatchingType'] == true)
      {
          $scope.anytype = false;
          $scope.newForm = "browseapp/components/workslist/new/newformtemplate.html";
      }
      else
      {
          $scope.anytype = true;
      }

});

app.controller('newFormDisplay',function($scope, typesService) {

      $scope.display = function(typeChosen)
      {
          var templatename = typeChosen.contentType;

          if (templatename != null)
          {
              typesService.setSelectedTypeIDByName(typeChosen.contentType);
              $scope.newForm = "browseapp/components/workslist/new/newformtemplate.html";
          }
          else
          {
              $scope.newForm = "browseapp/components/workslist/new/noselection.html";
          }
      };

});

app.controller('generateFormController',function($scope, $http, $sce, typesService, locationTracker) {

        var typeID = typesService.getSelectedTypeID();
        loct = locationTracker.getLocation();

        $http.get("reqs/construct/form/" + typeID + "/" + loct['catID'])
          .success(function(response)
            {
              $scope.generatedForm = $sce.trustAsHtml(response);
            });

});

app.directive("compileHtml", function($parse, $sce, $compile) {
    return {
        restrict: "A",
        link: function (scope, element, attributes) {

            var expression = $sce.parseAsHtml(attributes.compileHtml);

            var getResult = function () {
                return expression(scope);
            };

            scope.$watch(getResult, function (newValue) {
                var linker = $compile(newValue);
                element.append(linker(scope));
            });
        }
    }
});
