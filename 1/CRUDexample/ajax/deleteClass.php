<?php

if(isset($_POST['class_id']) && isset($_POST['class_id']) != "")
{
	require_once 'db_connection.php';

	// get user id
	$class_id= $_POST['class_id'];

	// delete User
	$query = "DELETE FROM przedmioty WHERE idprzedmiot='$class_id'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
}
?>