'use strict';

angular.module('GoogleApi', ['ngRoute'])
    .service('map', function() {
        this.init = function () {
            var options = {
                lat: 49.54987,
                lng: 25.5941
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: options
            });
            var marker = new google.maps.Marker({
                position: options,
                map: map
            });
        }
    });