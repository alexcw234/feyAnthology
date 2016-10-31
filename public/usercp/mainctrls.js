var app = angular.module("userCP.mainctrls", []);



app.controller("defaultctrl", function($scope){

});

app.controller("editprofilectrl", function($scope){

});

/*
* Main controller for the my categories table
*
*/
app.controller("mycatsctrl",function($scope, $state) {






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
