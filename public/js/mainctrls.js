var app = angular.module("browseApp.mainctrls", []);

app.controller("header", function($scope){
//    $scope.header = "Welcome to Fey Anthology!";
});

app.controller("header_c", function($scope) {

$scope.$parent.header = "List of categories";

});


app.controller("header_l", function($scope) {

$scope.$parent.header = "List";

});


app.controller("header_n", function($scope) {
$scope.$parent.header = "Submit something new";

});
