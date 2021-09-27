var app =angular.module('crudApp',[]);

app.controller('crudController', function($http,$scope){

	$scope.success =false;
	

	$scope.fetchData = function(){
		$http.get('db_scripts/fetch_data.php')
			 .then(function(response){
			 	$scope.namesData = response.data;
			 	console.log($scope.namesData);
			 });
	}
});