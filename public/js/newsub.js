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

app.controller('newFormCtrl',function($scope, $http) {

    $scope.newentry = {};



    $scope.typeID;

    $scope.submitEntry = function(tags) {

        var infojson = $scope.newentry;
        var tagarray = tags;

        var result = [];

        //'catID=' + $scope.catInfo[0].catID + '&type=' + $scope.typeID + '&';
        result['catID'] = $scope.catInfo[0].catID;
        result['type'] = $scope.typeID;

        for (key in infojson) {

      // result += key + '=' + encodeURIComponent(infojson[key]) + '&';

          result[key] = encodeURIComponent(infojson[key]);
        }

    //      result += 'tags' + '=';

        for (i in tagarray) {

          tagjson = tagarray[i];

          for (key in tagjson) {

          //  result += tagjson[key] + ',';
            result.tags.push(tagjson[key]);
          }
        }

      //  result = result.slice(0,-1);

        console.log(result);
        $http.post("submission/new", result)
          .success(function(response)
            {
              console.log('Success!');

            });

    };

});

app.controller('newFormSelect',function($scope, $http) {

      $http.get("reqs/types/showall")
      .success(function(response){

        $scope.types = response;

      });
});

app.controller('newFormDisplay',function($scope) {

        $scope.display = function(type) {

          $scope.newForm;
          var templatename = type.contentType;
          $scope.$parent.$parent.typeID = type.typeID;

          if (templatename != null)
          {

          $scope.newForm = "forms/" + templatename.toLowerCase() + ".html";

          }
          else
          {
          $scope.newForm = "forms/noselection.html";

          }
        };

});
