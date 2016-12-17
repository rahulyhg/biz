var messageService = angular.module('services', ['ngResource', 'services.config']);

messageService.factory('messageService', ['$resource', 'configuration',
    function ($resource, configuration) {
        return {
            posts: $resource(configuration.apiUrl + 'posts/:post', { post: '@post' }),
            comments: $resource(configuration.apiUrl + 'comments/:comment', { comment: '@comment' }),
            users: $resource(configuration.apiUrl + 'users/:user', { user: '@user' })
        };

    }]);