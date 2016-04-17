var app = angular.module("browseApp.mainctrls", []);

app.controller("header", function($scope){
//    $scope.header = "Welcome to Fey Anthology!";
});


/*
* Main controller for the category state.
*
*/
app.controller("controller_c", function($scope) {

$scope.$parent.header = "Select a category:";

$scope.$parent.sidebar_title = "Categories";

});

/*
* Main controller for the works list state.
*
*/
app.controller("controller_l", function($scope, $state, $stateParams, $http) {

$scope.$parent.header = "";

$scope.querystring = null;

$scope.catID = $stateParams.catID;

$http.get("reqs/getcatname/" + $scope.catID)
  .success(function(response)
    {
        $scope.catInfo = response;

    });



$state.go('list.table');

$scope.goToState = function(name){$state.go(name)};

//$scope.goNewState = function(name){$state.go(name)};

});

/*
* Main controller for the new entry state.
*
*/
app.controller("controller_n", function($scope, $stateParams) {

$scope.$parent.header = "Submit something new";

$scope.catID = $stateParams.catID;

});
