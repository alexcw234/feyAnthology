var app = angular.module("browseApp.newsub", []);


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

    $scope.submitEntry = function() {

        var infojson = $scope.newentry;
        var tagarray = $scope.tags;

        var result = '';

        for (key in infojson) {

          result += key + '=' + encodeURIComponent(infojson[key]) + '&';

        }
          result += 'tags' + '=';

        for (i in tagarray) {

          tagjson = tagarray[i];

          for (key in tagjson) {

            result += tagjson[key] + ',';
          }
        }

        query = '?' + result;

        $http.post("submission/new" + $scope.catInfo[0].catID + query)
          .success(function(response)
            {


            });

    };

});




app.controller('newFormDisplay',function($scope) {

        $scope.display = function(type) {

        $scope.newForm;
          var templatename = type;

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

app.controller('newFormSelect',function($scope, $http) {

      $http.get("reqs/types/showall")
      .success(function(response){

        $scope.types = response;

      });
});
