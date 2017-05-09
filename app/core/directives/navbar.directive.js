
angular.module('directives', ['ngRoute'])
    .directive('myNavbar', function () {
        return {
            restrict: 'A',
            templateUrl: 'core/directives/my_navbar.html',
        }
    });

