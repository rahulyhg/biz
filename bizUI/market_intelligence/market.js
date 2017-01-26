
(function () {
	'use strict';

	angular
		.module('myApp')
		.controller('MarketIntelligenceController', ['$scope', '$rootScope', '$timeout', '$state',  'accountServices', MarketIntelligenceController])

	function MarketIntelligenceController($scope, $rootScope, $timeout, $state,  accountServices) {

		$scope.loading = true;

		$scope.enquirySubmit = function () {

			if (!$scope.enqForm.company_name || !$scope.enqForm.found_year || !$scope.enqForm.contact_detail) {
				$scope.enqError = 'some filed is incorrect, please check !';
				return;
			}
			
			//alert(JSON.stringify($scope.enqForm));

			$scope.enqForm.user_id = $rootScope.globals.currentUser.user_id;
			
			accountServices.market_intelligene.enquiry($scope.enqForm, function (result) {

				if (result.status=="success") {
					$scope.enqForm = {};
					$scope.regSucess = true; 

				}else{

					$scope.enqError = result.message || 'Some values are incorrect!';
				}

			}, function (err) {
				console.log(err);
			});

			
		};

	}
	
	
})();
