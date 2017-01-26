
(function () {
	'use strict';

	angular
		.module('myApp')
		.controller('IndustryRepController', ['$scope', '$rootScope', '$timeout', '$state',  'accountServices', IndustryRepController])

	function IndustryRepController($scope, $rootScope, $timeout, $state,  accountServices) {

		$scope.loading = true;

		$scope.ind_list = '';

		accountServices.industry_report.list({}, function(result) {

		 	$scope.ind_list = result.ind_list;
		});

		var currentYear = new Date().getFullYear();
		currentYear = currentYear - 4;

        $scope.years = [];
        for (var i = 0; i <= 5; i++){
            $scope.years[i] = currentYear + i;
        }
        alert($scope.years[4]);

	}

	
	
})();
