<?php
include("db_connection.php");

if(isset($_POST['idprzedmiot']) && isset($_POST['idprzedmiot']) != "")
{
	$class_id = $_POST['idprzedmiot'];

	$query = "SELECT nazwaPrzedmiotu,wykladowca 
	FROM przedmioty 
	WHERE idprzedmiot='$class_id'";
	
	$result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
	echo json_encode($row);
}

?>