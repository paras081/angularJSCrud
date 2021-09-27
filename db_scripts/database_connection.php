
<?php
//database connection establishment
	try{
	 
	  $conn = new PDO("mysql:host=localhost;dbname=angularCrud","root","");
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
	}catch(PDOException $e){
		echo "connection failed ". $e->getMessage();
 	}
 ?>
