'use strict';

angular.module('backend_data', [])
    .service("data", ['$http','$location','$route', function($http) {

            this.getData = function(controller_name, get) {
                return $http.get(configs.serviceBack + controller_name, get);
            },
            this.postData = function(controller_name, post) {
                return $http.post(configs.serviceBack + controller_name, post)
                    .then( successHandler )
                    .catch( errorHandler );
                function successHandler( result ) {
                    //$location.path(configs.serviceApp+'#/home');
                }
                function errorHandler( result ){
                    alert("Error data")
                    //$location.path('/home')
                }
            };

    }]);