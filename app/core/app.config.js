var configs = {
    serviceApp: 'http://clinic_queue.loc/app/',
    serviceBack: 'http://clinic_queue.loc/backend/web/',
    images: 'http://clinic_queue.loc/backend/images',
    page: 'page/',
}

angular.module("config", ["ngRoute"])
    .config(['$routeProvider', '$httpProvider', function ($routeProvider, $httpProvider) {
        $routeProvider
            .when('/home',
                {
                    templateUrl:    configs.page+'home/home.html',
                    controller:     'HomeCtrl'
                })
            .when('/about',
                {
                    templateUrl:    configs.page+'about/about.html',
                    controller:     'AboutCtrl'
                })
            .when('/contact',
                {
                    templateUrl:    configs.page+'contact/contact.html',
                    controller:     'ContactCtrl'
                })
            .when('/consultation',
                {
                    templateUrl:    configs.page+'consultation/consultation.html',
                    controller:     'ConsultationCtrl'
                })
            .when('/login',
                {
                    templateUrl:    configs.page+'login/login.html',
                    controller:     'LoginCtrl'
                })
            .when('/register',
                {
                    templateUrl:    configs.page+'register/register.html',
                    controller:     'RegisterCtrl'
                })
            .when('/account',
                {
                    templateUrl:    configs.page+'account/account.html',
                    controller:     'AccountCtrl'
                })
            .when('/prescription',
                {
                    templateUrl:    configs.page+'prescription/prescription.html',
                    controller:     'PrescriptionCtrl'
                })
            .when('/practice',
                {
                    templateUrl:    configs.page+'practice/practice.html',
                    controller:     'PracticeCtrl'
                })
            .when('/radiology',
                {
                    templateUrl:    configs.page+'radiology/radiology.html',
                    controller:     'RadiologyCtrl'
                })
            .when('/my_consult',
                {
                    templateUrl:    configs.page+'my_consult/my_consult.html',
                    controller:     'My_consultCtrl'
                })
            .otherwise(
                {
                    templateUrl:    configs.page+'home/home.html',
                    controller:     'HomeCtrl'
                });
        $httpProvider.interceptors.push('authInterceptor');
    }]);