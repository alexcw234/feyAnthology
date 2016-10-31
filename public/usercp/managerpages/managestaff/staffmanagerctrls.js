var app = angular.module("userCP.staffmanagerctrls", []);

app.controller("managestaffctrl", function($scope, $state, $stateParams, $http){
  /**
  * Gets user level for the category (display purposes only, do actual validation on backend).
  */
  $http.get("displaycheck/group/" + $stateParams.catID)
    .success(function(response)
      {
          $scope.level = response.level;
      });

  /**
   * Some variables for here
   *
   */
   var page = 1;
   var userID;
   $scope.formdata = {};

   $scope.userFound = -1;


  /**
  * Gets List of staff for this category
  *
  */

  $http.get("reqs/users/" + $stateParams.catID)
    .success(function(response)
    {

      $scope.users = response;
    });

  /**
  * Refresh mods list
  *
  */
  getMods = function()
  {
  //var query = '?' + encodeURI(querystring);

  $http.get("reqs/users/" + $stateParams.catID)
    .success(function(response)
      {
        $scope.users = response;
      });
  }

  /**
  * Search for a user
  */
  $scope.finduser = function()
  {
    usertofind = $scope.formdata.username;
    var query = '?username=' + encodeURI(usertofind);

    $http.get("reqs/finduser/" + $stateParams.catID + query)
      .success(function(response)
        {

          $scope.founduser = response;

          if ($scope.founduser.length < 1)
          {
          $scope.userFound = false;
          $scope.NotFoundMsg = "Couldn't find a user with that name in this category.";
          }
          else if ($scope.founduser[0].level < 70 && $scope.founduser[0].level > 50)
          {

          $scope.usernamesearchresult = $scope.founduser[0].username;
          userID = $scope.founduser[0].userID;

          $scope.userFound = 1;


          }
          else if ($scope.founduser[0].level >= 70)
          {
          $scope.userFound = 0;
          $scope.NotFoundMsg = $scope.founduser[0].username + " is already on staff!";

          }
          else
          {
          $scope.userFound = 0;
          $scope.NotFoundMsg = "Couldn't find a user with that name in this category";
          }


        });


  }


      /**
      * Promote a user to moderator
      */
      $scope.promote = function()
      {
        $http.get("role/promote/" + $stateParams.catID + "/" + userID)
          .success(function(response)
            {
              getMods();
              $scope.cancel();
            });
      }

      /**
      * Cancel Promotion Dialog
      */
      $scope.cancel = function()
      {
        $scope.formdata = {};

        $scope.userFound = -1;
      }

      /**
      * Demote a moderator to contributor
      */
      $scope.demote = function(id)
      {

        $http.get("role/demote/" + $stateParams.catID + "/" + id)
          .success(function(response)
            {
              getMods();
            });
      }


});
