
angular.module("account", ['filters'])
    .controller('AccountCtrl', ['$scope', '$http', '$window', 'data', function($scope, $http, $window, data) {
        console.log('inside account controller');
        data.getData('patient_backend/get_patient', {params:{id:$window.sessionStorage.user_id, date:1}} ).then(function(data){
            console.log(data.data);
            $scope.patient = data.data;
        })
    }]);