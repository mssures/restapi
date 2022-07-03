<?php
$conn = new mysqli("localhost", "root", "", "apidemos");
if($conn->connect_error)
{
  die("Error failed to connect to MySQL: " . $conn->connect_error);
}
$requestMethod = $_SERVER['REQUEST_METHOD'];
if($requestMethod=="POST")
{
  $data=json_decode(file_get_contents("php://input"));
  $Empname = $data->name;
  $Empage  = $data->age;
  $insertQuery = "insert into emp set name='$Empname',age='$Empage' ";
  if(mysqli_query($conn,$insertQuery))
  {
  	$status = 1;
	$statusMessage = "Data added Successfully";
  }
  else
  {
  $status = 0;
  $statusMessage = "Data is not added!";
  }
  $dataResponse = array(
   						"Empname" => $Empname,
						"Empage"  => $Empage,
						"status" => 1,
						"statusMessage" => $statusMessage
  						);
						
  header("Content-Type:application/json");						
  echo json_encode($dataResponse);
}
?>
