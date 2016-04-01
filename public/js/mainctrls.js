var app = angular.module("browseApp.mainctrls", []);

app.controller("header", function($scope){
//    $scope.header = "Welcome to Fey Anthology!";
});

app.controller("controller_c", function($scope) {

$scope.$parent.header = "List of categories";

});


app.controller("controller_l", function($scope) {

$scope.$parent.header = "List";

});


app.controller("controller_n", function($scope) {
$scope.$parent.header = "Submit something new";

});
