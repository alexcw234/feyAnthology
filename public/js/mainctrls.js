var app = angular.module("browseApp.mainctrls", []);

app.controller("header", function($scope){
//    $scope.header = "Welcome to Fey Anthology!";
});


/*
* Main controller for the category state.
*
*/
app.controller("controller_c", function($scope) {

$scope.$parent.header = "List of categories";

});

/*
* Main controller for the works list state.
*
*/
app.controller("controller_l", function($scope, $state, $stateParams) {

$scope.$parent.header = "List";

$scope.catID = $stateParams.catID;

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
