
angular.module('auth_service', ['ngRoute'])
    .factory('authInterceptor', function ($q, $window, $location) {
        return {
            request: function (config) {
                if ($window.sessionStorage.access_token) {
                    config.headers.Authorization = 'Bearer ' + $window.sessionStorage.access_token;
                }
                return config;
            },
            responseError: function (rejection) {
                if (rejection.status === 401) {
                    $location.path('/login').replace();
                }
                return $q.reject(rejection);
            }
        };
    });

