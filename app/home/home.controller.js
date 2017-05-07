
angular.module("home", ['filters'])
    .controller('HomeCtrl', ['$scope', '$http', 'data',function($scope, $http, data) {
        console.log('inside home controller');
        data.getData('patient_backend/').then(function(data){
            $scope.patient = data.data;
            console.log($scope.patient);
        });
    }]);

