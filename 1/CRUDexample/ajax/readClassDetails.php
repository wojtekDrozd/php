<?php
include("db_connection.php");

if(isset($_POST['class_id']) && isset($_POST['class_id']) != "")
{
	$class_id = $_POST['class_id'];

	$query = "SELECT nazwaPrzedmiotu,wykladowca 
	FROM przedmioty 
	WHERE idprzedmiot='$class_id'";
	
	$result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
	$response= json_encode($row);
	
	echo $response;
	
}

?>