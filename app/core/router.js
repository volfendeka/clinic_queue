
angular.module("router", ["ngRoute"])
    .config(function ($routeProvider) {

        $routeProvider
            .when('/home',
                {
                    templateUrl:    'home/home.html',
                    controller:     'HomeCtrl'
                })
            .when('/about',
                {
                    templateUrl:    'about/about.html',
                    controller:     'AboutCtrl'
                })
            .when('/contact',
                {
                    templateUrl:    'contact/contact.html',
                    controller:     'ContactCtrl'
                })
            .when('/consultation',
                {
                    templateUrl:    'consultation/consultation.html',
                    controller:     'ConsultationCtrl'
                })
            .otherwise(
                {
                    templateUrl:    'home/home.html',
                    controller:     'HomeCtrl'
                });
    })
    .controller('navBar',
        ['$scope', '$location', function ($scope, $location) {
            $scope.navClass = function (page) {
                var currentRoute = $location.path().substring(1) || 'home';
                return page === currentRoute ? 'active' : '';
            };
        }]);


