
'use strict';
var app = angular.module("app", [
        "router",
        'backend_data',
        'home',
        'about',
        'contact',
        'consultation',
        'GoogleApi',
    ]);
var serviceBase = 'http://clinic_backend.loc/';
