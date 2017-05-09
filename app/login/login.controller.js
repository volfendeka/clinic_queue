
angular.module("login", [])
    .controller('LoginCtrl', ['$scope', '$http', '$window', '$location', 'data',
        function($scope, $http, $window, $location, data) {
            console.log('inside login controller');
            $scope.login = function () {
                $scope.submitted = true;
                $scope.error = {};
                $http.post('http://clinic_queue.loc/backend/web/api/login', $scope.userModel
                    ).success(function (data) {
                    $window.sessionStorage.access_token = data.access_token;
                        $location.path('/home').replace();
                    }).error(function (data) {
                        angular.forEach(data, function (error) {
                            $scope.error[error.field] = error.message;
                        });
                    }
                );
            };
        }
    ]);


