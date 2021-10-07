var app =angular.module('crudApp',[]);

app.controller('crudController', function($http,$scope){

	$scope.success =false;

	$scope.error =false;
	

	$scope.fetchData = function(){
		$http.get('db_scripts/fetch_data.php')
			 .then(function(response){
			 	$scope.namesData = response.data;
			 	// console.log($scope.namesData);
			 });
	}



	$scope.openModal =function(){
		var modal_popup =angular.element('#crudmodal');
		modal_popup.modal('show');
	}

	$scope.closeModal =function(){
		var modal_popup =angular.element('#crudmodal');
		modal_popup.modal('hide');
	}

	//show modal for inserting data
	$scope.addData = function(){
		$scope.modalTitle = "Add Data";
		$scope.submit_button = "Insert";
		$scope.openModal();
	}


	$scope.submitForm =function(){
		$http.post("db_scripts/crud.php",
						 		{
						 			'first_name':$scope.first_name,
						 			'last_name':$scope.last_name,
						 			'action':$scope.submit_button,
						 			'id':$scope.hidden_id,
						 		}).then(function(response){
						 			 console.log(response);
						 			$scope.success =true;
						 			$scope.error =true;
						 			$scope.errorMessage =response.data.error;
						 			$scope.successMessage = response.data.message;
						 			// $scope.closeModal();
						 		});
	}
});













