var app = angular.module("userCP.tablectrls", []);






/*
* Sends request for categories table
*
*/
app.controller("catstabledisplayctrl", function($scope, $http) {
    $http.get("reqs/cats/mycats")
      .success(function(response)
        {
            $scope.cats = response;

        });

});


app.controller("submissionstablectrl", function($scope, $state, $stateParams, $http){

    $scope.selected;


    $http.get("reqs/pending/" + $stateParams.catID)
      .success(function(response)
        {
            $scope.pending = response;

            for (i in $scope.pending)
            {
              $scope.pending[i].tags = $scope.pending[i].tags.slice(1,-1);
              $scope.pending[i].tags = $scope.pending[i].tags.split(",");

              $scope.pending[i].info = JSON.parse($scope.pending[i].info);
            }

          });

    $scope.comment = {};

    $scope.setworkapproval = function(id, comment, isapproved)
    {

          var toSend = {};

          toSend['workID'] = id;

          toSend['comment'] = comment;

          toSend['isapproved'] = isapproved;

          toSend['catID'] = $stateParams.catID;

          $http.post("submission/setworkapproval", toSend);

      	};

    $scope.removeRow = function(id){
      var index = -1;
      var comArr = eval( $scope.pending );
      for( var i = 0; i < comArr.length; i++ ) {
        if( comArr[i].workID === id ) {
          index = i;
          break;
        }
      }
      if( index === -1 ) {
        console.log("Error");
      }
      $scope.pending.splice( index, 1 );
    };


});




/*
*   URL filter from:
*  http://stackoverflow.com/questions/21623967/how-to-use-ng-href-with-absolute-url/27546112
*/
'use strict';
app.filter("urlFilter", function () {
return function (link) {
    var result;
    var startingUrl = "http://";
    var httpsStartingUrl = "https://";
    if(link.startWith(startingUrl)||link.startWith(httpsStartingUrl)){
        result = link;
    }
    else {
    result = startingUrl + link;
    }
    return result;
}
});
String.prototype.startWith = function (str) {
return this.indexOf(str) == 0;
};
