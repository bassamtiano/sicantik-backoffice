$app = angular.module('sicantik_backoffice', []);

function NavigationCtrl($http, $scope) {

	$scope.url = '';

	$scope.load_page = function(href) {

		alert(href);
		

	}

}