
angular.module("home", ['filters'])
    .controller('HomeCtrl', ['$scope', '$http', 'services',function($scope, $http, services) {
        console.log('inside home controller');
        services.getData('patient_backend/').then(function(data){
            $scope.patient = data.data;
            console.log($scope.patient);
        });
    }]);

