<?php

//połączenie z bazą
require_once 'db_connection.php';


if (isset ( $_POST )) {
	
	$teacher_id = $_POST['class_id'];
	$first_name = $_POST ['first_name'];
	$last_name  = $_POST ['last_name '];
	$faculty = $_POST['faculty'];
	$email = $_POST['email'];
	$pesel = $_POST['pesel'];
	
	
	$query = "UPDATE profesores 
	SET imie = '$first_name',
	naziwsko = '$last_name'
	katedra = '$faculty',
	email = '$email',
	pesel = '$pesel'
	WHERE idProfesores='$teacher_id'"; 
	
	mysqli_query ( $con, $query ); 
}
?>