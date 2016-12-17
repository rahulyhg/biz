"use strict";

var messageService = angular.module('services', ['ngResource', 'services.config']);

messageService.factory('accountServices', ['$resource', 'configuration', '$rootScope',
    function ($resource, configuration, $rootScope) {



        return {
            login:$resource(configuration.apiUrl + 'user/login',{},{
              login:{method:'POST'}
            }),
            logout: $resource(configuration.apiUrl + 'user/logout',{},{
              logout:{method:'POST'}
            }),
            user: $resource(configuration.apiUrl + 'user/signup', {}, {
                signup: { method: 'POST' }
            }),
            user: $resource(configuration.apiUrl + 'user/forgot_password', {}, {
                forgot_password: { method: 'POST' }
            }),
            dashboard: $resource(configuration.apiUrl + 'dashboard/companies', {user_id: '@user_id'}, {
                company_list: { method: 'GET' }
            }),
            company: $resource(configuration.apiUrl + 'dashboard/compdelete', {user_id:'@user_id',comp_id:'@comp_id'}, {
                compdelete: { method: 'GET' }
            }),
            
        };

    }]);
