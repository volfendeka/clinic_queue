var configs = {
    serviceApp: 'http://clinic_queue.loc/app/',
    serviceBack: 'http://clinic_queue.loc/backend/web/'
}

angular.module("config", ["ngRoute"])
    .config(['$routeProvider', '$httpProvider', function ($routeProvider, $httpProvider) {
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
            .when('/login',
                {
                    templateUrl:    'login/login.html',
                    controller:     'LoginCtrl'
                })
            .when('/register',
                {
                    templateUrl:    'register/register.html',
                    controller:     'RegisterCtrl'
                })
            .otherwise(
                {
                    templateUrl:    'home/home.html',
                    controller:     'HomeCtrl'
                });
        $httpProvider.interceptors.push('authInterceptor');
    }]);