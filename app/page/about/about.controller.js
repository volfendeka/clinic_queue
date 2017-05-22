
angular.module("about", ['filters'])
    .controller('AboutCtrl', ['$scope', '$http', 'data', function($scope, $http, data) {
        console.log('inside about controller');
        data.getData('doctor_backend').then(function(data){
            $scope.doc = data.data;
        })
    }]);