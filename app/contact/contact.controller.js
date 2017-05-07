
angular.module("contact", [])
    .controller('ContactCtrl', ['$scope', 'map', function($scope, map) {
        console.log('inside contact controller');
        map.init(49.54987, 25.5941);
    }]);

