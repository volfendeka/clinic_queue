
angular.module("login", [])
    .controller('LoginCtrl', ['$scope', '$http', '$window', '$location',
        function($scope, $http, $window, $location) {
            console.log('inside login controller');
            $scope.login = function () {
                $scope.submitted = true;
                $scope.error = {};
                $http.post(configs.serviceBack + '/api/login', $scope.userModel)
                    .success(function (data) {
                        $window.sessionStorage.access_token = data.access_token;
                        $window.sessionStorage.user_id = data.user_id;
                        $location.path('/home').replace();
                    })
                    .error(function (data) {
                        angular.forEach(data, function (error) {
                            $scope.error[error.field] = error.message;
                        });
                    });
            };
        }
    ]);


