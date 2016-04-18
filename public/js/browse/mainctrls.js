/*
* Controllers that setup things that other parts of the view/state
* depend on.
*/
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

$scope.$parent.sidebar_backtrack = false;
$scope.$parent.sidebar_onCatlist = true;

$scope.$parent.sidebar_title = "Categories";
$scope.$parent.sidebar_text = "Select a category:";

});

/*
* Main controller for the works list state. Loads the template and then does
* state.go() to list.table to load the table.
*/
app.controller("controller_l", function($scope, $state, $stateParams, $http) {

$scope.$parent.header = "";

$scope.querystring = null; // Kept here for accessability.

$scope.catID = $stateParams.catID;

$http.get("reqs/getcatname/" + $scope.catID)
  .success(function(response)
    {
        $scope.catInfo = response;

        $scope.$parent.sidebar_backtrack = true;
        $scope.$parent.sidebar_onCatlist = false;

        $scope.$parent.sidebar_title = response.catName;
        $scope.$parent.sidebar_text = response.description;

    });

$state.go('list.table');

$scope.goToState = function(name){$state.go(name)};


});

/*
* Main controller for the new entry state.
*
*/
app.controller("controller_n", function($scope, $stateParams) {

$scope.$parent.header = "Submit something new";

$scope.catID = $stateParams.catID;

});
