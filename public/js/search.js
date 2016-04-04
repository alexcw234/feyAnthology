var app = angular.module("browseApp.search", ['ngTagsInput']);

app.controller("searchbox", function($state, $scope) {

  $scope.formdata = {};



  $scope.submitSearch = function() {

      // Convert jsons to query strings

        var infojson = $scope.formdata;
        var tagarray = $scope.tags;

        var result = '';

        for (key in infojson) {

          result += key + '=' + infojson[key] + '&';

        }

          result += 'tags' + '=';

        for (i in tagarray) {

          tagjson = tagarray[i];

          for (key in tagjson) {

            result += tagjson[key] + ',';
          }
        }

        console.log(result);
  };

});
