<?php

	include ('database_connection.php');

	$query = "SELECT * FROM tbl_sample ORDER BY id ASC";


	$statement = $conn->prepare($query);


  if($statement->execute()){
  	$result = $statement->setFetchMode(PDO::FETCH_ASSOC);
  	foreach ($statement->fetchAll() as $key => $value) {
  		$data[] =$value;
  	}
  }



  	echo json_encode($data);

?>
