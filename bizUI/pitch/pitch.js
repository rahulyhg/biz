
(function () {
	'use strict';

	angular
		.module('myApp')
		.controller('PitchController', ['$scope', '$rootScope', '$timeout', '$state',  'accountServices', PitchController])

	function PitchController($scope, $rootScope, $timeout, $state,  accountServices) {

		$scope.loading = true;

	}

	
	
})();

