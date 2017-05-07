'use strict';

angular.module('GoogleApi', ['ngRoute'])
    .service('map', function() {
        this.init = function (lat, lng) {
            var options = {
                lat: lat,
                lng: lng
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