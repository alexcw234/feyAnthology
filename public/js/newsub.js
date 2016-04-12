var app = angular.module("browseApp.newsub", []);


app.controller('permissions', function($scope, $http, $stateParams) {

  $http.get("reqs/check/")
    .success(function(response)
      {

          $scope.cats = response;

      });




});

app.controller('newSubmission',function($scope) {






});

app.controller('newFormCtrl',function($scope) {






});

app.controller('newFormDisplay',function($scope) {

        $scope.display = function(type) {

          var templatename = type;


          




        };

/*
        $scope.display = function(type) {

          var shortfield = '<input style="width: 200;" ';
          var longfield = '<input style="width: 450;" ';
          var medfield = '<input style="width: 300;" ';
          var boxfield = '<textarea style="width: 600; height: 100;" ';

  //        console.log(type);
  //        console.log(typeof(type));

          var fields = JSON.parse(type);
  //        console.log(fields);

          for (field in fields)
          {
              var parameters = fields[field];

              parameters = parameters.split(',');
//              console.log(parameters);

              var newfield = "";

              // field size

              if (parameters[0] == 'short')
              {
                newfield = newfield.concat(shortfield);

              } else if (parameters[0] == 'long')
              {
                newfield = newfield.concat(longfield);

              } else if (parameters[0] == 'medium')
              {
                newfield = newfield.concat(medfield);

              } else if (parameters[0] == 'box')
              {
                newfield = newfield.concat(boxfield);
              }

              // append model name

              newfield = newfield.concat(' ng-model="newSubmission.' + field + '"');

              // if required
              if (parameters[1] == 'true')
              {
                newfield = newfield.concat(' required>')
              }
              else
              {
                newfield = newfield.concat('>')
              }

              // close input tag if box

              if (parameters[0] == 'box')
              {
                newfield = newfield.concat('</textarea>');
              }

              fields[field] = newfield;
              console.log(fields[field]);
          }

          $scope.newform = fields;

        };
*/


});

app.controller('newFormSelect',function($scope, $http) {

      $http.get("reqs/types/showall")
      .success(function(response){

        $scope.types = response;

      });
});
