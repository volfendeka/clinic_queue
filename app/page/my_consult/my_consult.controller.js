
angular.module("my_consult", ['filters'])
    .controller('My_consultCtrl', ['$scope', '$http', '$window', 'data', function($scope, $http, $window, data) {
        console.log('inside my_consult controller');
        data.getData('patient_backend/get_patient', {params:{id:$window.sessionStorage.user_id}}).then(function(data){
            $scope.meetings = data.data;
        })
    }]);