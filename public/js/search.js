var app = angular.module("browseApp.search", []);

app.controller("searchbox", function($state) {
    $state.transitionTo('list.search');

});
