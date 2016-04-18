var app = angular.module("userCP.mainctrls", []);



app.controller("header", function($scope){

});


/*
* Main controller for the usercp menu
*
*/
app.controller("menucontroller", function($scope, $state) {

$scope.$parent.header = "User Control Panel";

$scope.goToState = function(name){$state.go(name)};

});
