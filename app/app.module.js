
'use strict';
var app = angular.module("app", [
        "router",
        'backend_data',
        'home',
        'about',
        'contact',
        'consultation'
    ]);
var serviceBase = 'http://clinic_backend.loc/';
