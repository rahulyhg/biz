
(function () {
	'use strict';

	angular
		.module('myApp')
		.controller('CompanyController', ['$scope', '$timeout', '$state',  'accountServices', CompanyController]);


	function CompanyController($scope, $timeout, $state,  accountServices) {
		
		console.log("main");
	}
})();
