
angular.module("about", ['filters'])
    .controller('AboutCtrl', ['$scope', '$http', 'services',
        function($scope, $http, services) {
            console.log('inside about controller');
            services.getData('doctor_backend').then(function(data){
                $scope.doc = data.data;
                console.log($scope.doc);
            })
    }]);