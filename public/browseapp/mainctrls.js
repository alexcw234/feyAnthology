/*
* Controllers that setup things initially.
*
*/
var app = angular.module("browseApp.mainctrls", []);

/*
* Controller that goes first and sets any provider variables that
* require http calls. (others are in app.config())
*/
app.controller("initializer", function($scope, usergroupProvider)
{

    usergroupProvider.setglobalView()
    .then(function()
    {
      $scope.initialized = true;

    })
    .catch(function()
    {
      $scope.iniError = "Error in initialization: Global load failed.";
    });

});

app.directive("ajaxCloak", ['$interval', '$http', function ($interval, $http) {
            return {
                restrict: 'A',
                link: function (scope, element, attrs) {
                    let stop = $interval(() => {
                        if ($http.pendingRequests.length === 0) {
                            $interval.cancel(stop);
                            attrs.$set("ajaxCloak", undefined);
                            element.removeClass("ajax-cloak");
                        }
                    }, 100);

                }
            };
        }]);
