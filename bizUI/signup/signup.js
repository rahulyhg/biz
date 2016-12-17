(function () {
	'use strict';

	angular
		.module('myApp.signup', ['services', 'angular-md5'])
		.controller('SignupController', ['$scope', '$timeout', '$state', 'md5', 'accountServices', SignupController]);


	function SignupController($scope, $timeout, $state, md5, accountServices) {

		$scope.regSucess = false;

		$scope.userRegister = function () {

			if (!$scope.loginUser.firstName || !$scope.loginUser.lastName || !$scope.loginUser.Email || !$scope.loginUser.Password) {
				$scope.loginError = 'some filed is incorrect, please check !';
				return;
			}
			if ($scope.loginUser.Password != $scope.loginUser.confirmPassword) {
				$scope.loginError = 'password not match confirm password !';
				return;
			}
			// var encryptedPassword = md5.createHash($scope.loginUser.password);
			var newUser = {
				fname: $scope.loginUser.firstName,
				lname: $scope.loginUser.lastName,
				email: $scope.loginUser.Email,
				password: $scope.loginUser.Password
			};
	
			accountServices.user.signup(newUser, function (result) {

				if (result.status=="success") {
					$scope.loginUser = {};
					$scope.regSucess = true; 

				}else{

					$scope.loginError = result.message || 'Some values are incorrect!';
				}

			}, function (err) {
				console.log(err);
			});


		};


	}
})();
