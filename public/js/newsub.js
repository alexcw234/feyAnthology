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


        result['catID'] = $scope.catInfo[0].catID;
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
                  state.go('list.addscreen');
              }
              else if (response.status == 'override')
              {
                  state.go('list.overscreen');
              }
              else if (response.status == 'failure')
              {
                  state.go('list.failscreen');
              }

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
