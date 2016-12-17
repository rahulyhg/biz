
(function () {
	'use strict';

	angular
		.module('myApp')
		.controller('DashController', ['$scope', '$rootScope', '$timeout', '$state',  'accountServices', DashController])
		.controller('CompanyaddController', ['$scope','$rootScope', '$timeout', '$state',  'accountServices', CompanyaddController]);


	function DashController($scope, $rootScope, $timeout, $state,  accountServices) {

		$scope.loading = true;

		$scope.getcomp = function() {

			var userid = $rootScope.globals.currentUser.user_id;

			accountServices.dashboard.company_list({ user_id: userid}, function(result) {

	         $scope.comp_list = result.comp_list;

	      	});
		};

		$scope.compdelete = function(compid) {

			var userid = $rootScope.globals.currentUser.user_id;

	      	accountServices.company.compdelete({ user_id:userid, comp_id:compid}, function(result) {

	        if (result && result.status=='success') {
	         
	          $scope.getcomp();

	        }
	      });

	    };
      	
      	$scope.getcomp();

	}

	function CompanyaddController($scope,$rootScope, $timeout, $state,  accountServices) {
		
		console.log("main");
	}
	
})();
