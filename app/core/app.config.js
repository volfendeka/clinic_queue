var configs = {
    serviceApp: 'http://clinic_queue.loc/app/',
    serviceBack: 'http://clinic_queue.loc/backend/web/',
    images: 'http://clinic_queue.loc/backend/images',
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
            .when('/account',
                {
                    templateUrl:    'account/account.html',
                    controller:     'AccountCtrl'
                })
            .otherwise(
                {
                    templateUrl:    'home/home.html',
                    controller:     'HomeCtrl'
                });
        $httpProvider.interceptors.push('authInterceptor');
    }]);