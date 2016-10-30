var app = angular.module("browseApp.search", ['ngTagsInput']);

app.controller("searchbox", function($state, $scope, searchqueryService) {

  $scope.formdata = {};

  $scope.submitSearch = function() {

        var infojson = $scope.formdata;
        var tagarray = $scope.tags;

        searchqueryService.newQuerystring(infojson, tagarray);
        $state.go('list.table');
  };



});
