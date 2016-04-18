var app = angular.module("userCP.mainctrls", []);



app.controller("defaultctrl", function($scope){

});


/*
* Main controller for the mod categories table
*
*/
app.controller("modcatstablectrl", function($scope, $state) {

$scope.goToState = function(name){$state.go(name)};

});
