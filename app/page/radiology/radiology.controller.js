
angular.module("radiology", ['filters'])
    .controller('RadiologyCtrl', ['$scope', '$http', '$window', '$location', 'data',
        function($scope, $http, $window, $location, data) {
        console.log('inside radiology controller');


            data.getData("patient_backend/patient_id_pair").then(function(data){
                $scope.patients = data.data;
            });


            $scope.create = function () {
                if($scope.prescription != undefined) {
                    $scope.prescription.doctor_id = 2;
                }
                $scope.submitted = true;
                $scope.error = {};
                $http.post(configs.serviceBack + '/prescription_backend/create', $scope.prescription)
                    .success(function (data) {
                        alert('created');
                        $location.path('#/home').replace();
                    })
                    .error(function (data) {
                        angular.forEach(data, function (error) {
                            $scope.error[error.field] = error.message;
                        });
                    });
            };
    }
    ]);