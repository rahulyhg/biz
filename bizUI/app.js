'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp', [
	'ui.router',
	'ui.bootstrap',
	'myApp.login',
	'myApp.signup',	
	'services',
	'matchTo',
	'ngDialog',
	'ngTouch'
])
	.config(routeConfig)
	.controller("appController", ['$rootScope', "$scope", '$http', '$state',  'accountServices', appController])

.run(['$rootScope','$state', '$http', '$templateCache', 'accountServices', function ($rootScope, $state, $http, $templateCache, accountServices) {
	$rootScope.$on('$stateChangeStart', function(event, toState, toStateParams) {
		$templateCache.removeAll();
		// console.log($rootScope.globals.currentUser);
		if(toState.name!="login"&&toState.name!="signup"&&toState.name!="forgotpwd"){
			if(!$rootScope.globals||!$rootScope.globals.currentUser){
				event.preventDefault();
				$state.go("login");
			}
		}

	});



	$rootScope.logout=function(){

		if($rootScope.globals&&$rootScope.globals.currentUser){
			//$http.defaults.headers.common['sessionId']=$rootScope.globals.currentUser.sessionId;  //TODO need add headers
			$http.defaults.headers.common['user_id']=$rootScope.globals.currentUser.user_id;
			delete $http.defaults.headers.common['userId'];
			$rootScope.globals.currentUser=null;

			$state.go("login");
		}


	};

}])
.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="http://www.nasa.gov/multimedia/videogallery/ajax-loader.gif" width="20" height="20" />LOADING...</div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
  });


function routeConfig($stateProvider, $urlRouterProvider, $locationProvider) {

    $stateProvider
		.state('login', {
			url: '/login',
			templateUrl: 'login/login.html',
			controller: 'LoginController',
		})
		.state('signup', {
			url: '/signup',
			templateUrl: 'signup/signup.html',
			controller: 'SignupController'
		})
		.state('forgotpwd', {
			url: '/forgotpwd',
			templateUrl: 'login/forgotpwd.html',
			controller: 'ForgotpwdController'
		})		
		.state('dashboard', {
			cache: false,
			url: '/dashboard',
			templateUrl: 'dashboard/dashboard.html',
			controller: 'DashController'
		})
		.state('company', {
			url: '/company',
			templateUrl: 'company/company_dash.html',
			controller: 'CompanyController'
		})
		.state('add_company', {
			url: '/add_company',
			templateUrl: 'dashboard/company_add.html',
			controller: 'CompanyaddController'
		})
		.state('pitch', {
			url: '/pitch',
			templateUrl: 'pitch/pitch.html',
			controller: 'PitchController'
		})
		.state('industryreport', {
			url: '/industryreport',
			templateUrl: 'industry_report/report.html',
			controller: 'IndustryRepController'
		})
		.state('market_intelligence', {
			url: '/market_intelligence',
			templateUrl: 'market_intelligence/market.html',
			controller: 'MarketIntelligenceController'
		});

    $urlRouterProvider.otherwise('/login');

}

function appController($rootScope,$scope,$http,$state, accountServices) {
	$scope.currentDateFormat = 'MM/dd/yyyy';

}
