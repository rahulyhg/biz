(function() {
  'use strict';

  angular
    .module('myApp.login', ['services', 'angular-md5', 'ngCookies'])
    .controller('LoginController', ['$scope', '$rootScope', '$timeout', '$state', 'md5', 'accountServices', LoginController])
    .controller('ForgotpwdController', ['$scope', '$rootScope', '$timeout', '$state', 'accountServices', ForgotpwdController]);


  function LoginController($scope, $rootScope, $timeout, $state,  md5, accountServices) {
    
    $scope.loginError = false;

    $scope.userLogin = function() {
      //var encryptedPassword = md5.createHash($scope.loginUser.password);

      accountServices.login.login({ email: $scope.loginUser.userName, password: $scope.loginUser.password  }, function(result) {

        if (result && result.status=='success') {
          $rootScope.globals = {
            currentUser: result
          };
          $state.go('dashboard');

        } else {
          $scope.loginError = result.message || 'Username or password is incorrect!';
        }

      }, function(reason) {
        $scope.loginError =reason;
        console.log(reason);
      });

    };


  }

  function ForgotpwdController($scope, $rootScope, $timeout, $state, accountServices) {
    
    $scope.loginError = false;

    $scope.forgotpwd = function() {      
      
      accountServices.user.forgot_password({ email: $scope.loginUser.Email}, function(result) {

        if (result && result.status=='success') {
         
          $scope.pwdSucces = true;

        } else {

          $scope.loginError = result.message || 'Given email is incorrect!';
        }

      }, function(reason) {
        $scope.loginError =reason;
      });
      

    };

  }

})();
