
angular.module("router", [])
    .controller('navigation', ['$scope', '$location', '$window', function ($scope, $location, $window) {
            $scope.navClass = function (page) {
                var currentRoute = $location.path().substring(1) || 'home';
                return page === currentRoute ? 'active' : '';
            };
            $scope.loggedIn = function() {
                return Boolean($window.sessionStorage.access_token);
            };
            $scope.logout = function () {
                delete $window.sessionStorage.access_token;
                $location.path('/login').replace();
            };
        }]);


