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

        var result = array('catID' => $scope.catInfo[0].catID,
                            'type' => $scope.typeID,);

        for (key in infojson) {

          result.push(key => encodeURIComponent(infojson[key]));

        }

        result.push(tags => array());

        for (i in tagarray) {

          tagjson = tagarray[i];

          for (key in tagjson) {

            result.push.tags(key);
          }
        }

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
