<?php

	include ('database_connection.php');

  $form_data = json_decode(file_get_contents("php://input"));
  
	$message="";
  $error = array();
  $output = array();

    if($form_data->action == "Insert"){

      if(empty($form->first_name)){
        array_push($error,"Please enter First name");
      }else{
        $first_name=$form_data->first_name;
      }
      if(empty($form->last_name)){
        array_push($error,"Please enter  Last name");
      }else{
        $last_name=$form_data->last_name;
      }

      if(empty($error)){
          $statement = $conn->prepare("INSERT INTO tbl_sample (first_name,last_name) VALUES (?,?)");

          $statement->bindParam(1,$first_name,PDO::PARAM_STR);
          $statement->bindParam(2,$last_name,PDO::PARAM_STR);

          if($statement->execute()){
            $message = 'data inserted successfully';
          }
      }
    }
  

  $output['error'] =implode(",",$error);
  $output['message'] =$message;

  echo json_encode($output);
?>
