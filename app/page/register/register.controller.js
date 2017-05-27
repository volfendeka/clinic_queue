
angular.module("register", [])
    .controller('RegisterCtrl', ['$scope', '$http', '$window', '$location', 'data',
        function($scope, $http, $window, $location, data) {
            console.log('inside register controller');
            $scope.register = function () {
                $scope.submitted = true;
                $scope.error = {};
                $http.post(configs.serviceBack + '/api/register', $scope.userModel)
                    .success(function (data) {
                    $location.path('/login').replace();
                    })
                    .error(function (data) {
                        angular.forEach(data, function (error) {
                            $scope.error[error.field] = error.message;
                        });
                    });
            };
        }
    ]);