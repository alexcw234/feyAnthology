var app = angular.module("userCP.sidebar", []);

app.controller("sidebar",function($scope, $state){


$scope.goToState = function(name){$state.go(name)};

$scope.reloadPage = function(){window.location.reload();}


});
