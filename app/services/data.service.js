'use strict';

angular.module('backend_data', ['ngRoute'])
    .factory("services", ['$http','$location','$route',
        function($http) {
            return {
                getData: function(controller_name) {
                    return $http.get(serviceBase + controller_name);
                },
                createData: function(controller_name) {
                    return $http.post();
                }
            };
        }]);