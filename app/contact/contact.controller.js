angular.module("contact", [])
    .controller('ContactCtrl', ['$scope', 'map', function($scope, map) {
        console.log('inside contact controller');
        map.init();
    }]);

