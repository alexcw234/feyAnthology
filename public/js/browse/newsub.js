var app = angular.module("browseApp.newsub", ['ngTagsInput']);


app.controller('permissions', function($scope, $http, $stateParams) {

  $http.get("reqs/check/")
    .success(function(response)
      {

          $scope.cats = response;

      });




});

app.controller('newSubmission',function($scope, $http) {



});

app.controller('newFormCtrl',function($scope, $http, $state) {

    $scope.newentry = {};

    $scope.typeID;

    $scope.submitEntry = function(tags) {

        var infojson = $scope.newentry;
        var tagarray = tags;

        var result = {};


        result['catID'] = $scope.catInfo.catID;
        result['typeID'] = $scope.typeID;

        for (key in infojson) {



          result[key] = encodeURIComponent(infojson[key]);
        }



        var tagstring = '';

        for (i in tagarray) {

          tagjson = tagarray[i];

          for (key in tagjson)
          {


            tagstring += '"' + tagjson[key] + '" => "default",';
          }
        }
        tagstring = tagstring.slice(0,-1);

        result['tags'] = tagstring;

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

app.controller('newFormSelect',function($scope, $http) {

      $scope.categoryType = $scope.catOptions.type;

      $http.get("reqs/types/showall")
      .success(function(response){

        $scope.types = response;

        var foundmatchingtype = false;
        var matchedtype;
        for (i = 0; i < $scope.types.length; i++)
        {
            if ($scope.types[i].contentType == $scope.categoryType)
            {
              foundmatchingtype = true;
              matchedtype = $scope.types[i].typeID;

            }
        }
        if (foundmatchingtype == true)
        {
          $scope.anytype = false;
          $scope.$parent.typeID = matchedtype;
          $scope.newForm = "forms/" + "newformtemplate" + ".html";

        }
        else
        {
          $scope.anytype = true;
        }

      });

});

app.controller('newFormDisplay',function($scope) {

        $scope.display = function(type) {

          var templatename = type.contentType;
          $scope.$parent.$parent.typeID = type.typeID;

          if (templatename != null)
          {
          $scope.newForm = "forms/" + "newformtemplate" + ".html";

          }
          else
          {
            $scope.newForm = "forms/noselection.html";
          }
        };

});

app.controller('generateFormController',function($scope, $http, $sce) {

        var typeID = $scope.$parent.$parent.$parent.typeID;

        $http.get("reqs/construct/form/" + typeID + "/" + $scope.$parent.$parent.$parent.catInfo.catID)
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
