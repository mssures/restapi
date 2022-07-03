<?php 
$conn = new mysqli("localhost", "root", "", "apidemos");
if($conn->connect_error)
{
  die("Error failed to connect to MySQL: " . $conn->connect_error);
}
$requestMethod = $_SERVER['REQUEST_METHOD'];
if($requestMethod=="GET")
{
   $Empid='';
   if($_GET['id']!='')
   {
		 $Empid=$_GET['id'];
		 $selectQuery = "select name,age from emp where emp_id='$Empid'";
		 $selectRun = mysqli_query($conn,$selectQuery);
		 $Empdet = array();
		 while($empval=mysqli_fetch_array($selectRun,MYSQLI_ASSOC))
		 {
		   $Empdet[] = $empval;
		 }
		 header("Content-Type:application/json");
		 echo json_encode($Empdet);
		 
   }
}
?>
