var app = angular.module("browseApp.moderation", ['ngTagsInput']);


app.controller('editSubmission',function($scope, $http, $stateParams) {

    $scope.typeID;
    $scope.newentry = {};
    $scope.tags = [];
    $scope.categoryType = $scope.catOptions.type;

    $http.get("edit/work/" + $stateParams.workID)
    .success(function(response)
      {
        selectedWorkArray = response;
        $scope.selectedWork = selectedWorkArray[0];
        $scope.selectedWork.tags = $scope.selectedWork.tags.split(", ");

        $scope.selectedWork.info = JSON.parse($scope.selectedWork.info);
        $scope.typeID = $scope.selectedWork.typeID;

        $scope.newentry['URL'] = $scope.selectedWork.url;

        for (key in $scope.selectedWork.info)
        {
        $scope.newentry[key] = $scope.selectedWork.info[key];

        }
        for (i in $scope.selectedWork.tags)
        {
          parsedtag = $scope.selectedWork.tags[i].replace(/=>\".+$/,"");
          parsedtag = parsedtag.slice(1,-1);
          $scope.tags.push({'text': parsedtag});
        }
        $scope.newForm = "forms/editformtemplate.html";

      });
});

app.controller('editFormCtrl',function($scope, $http, $state,$stateParams) {

    $scope.typeID;



    $scope.submitEntry = function(tags) {

        var infojson = $scope.newentry;
        var tagarray = tags;

        var result = {};
        result['workID'] = $stateParams.workID;

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

        $http.post("edit/work/alter", result)
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


app.controller('deleteCtrl',function($scope, $http, $state,$stateParams) {

    $scope.deleteEntry = function() {
        result = {}
        workID = $stateParams.workID;
        result['workID'] = workID;

        $http.post("edit/work/delete", result)
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

    }

});
