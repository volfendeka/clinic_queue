
angular.module("prescription", ['filters'])
    .controller('PrescriptionCtrl', ['$scope', '$http', '$window', 'data', function($scope, $http, $window, data) {
        console.log('inside prescription controller');
        data.getData('prescription_backend/get_prescription', {params:{id:$window.sessionStorage.user_id}} ).then(function(data){
            $scope.prescription = data.data;
        })
    }]);