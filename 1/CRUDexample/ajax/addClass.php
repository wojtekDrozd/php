<?php
if (isset ( $_POST ['class_name'] ) && isset ( $_POST ['teacher_full_name'] )) {
	
	/*
	 * if(isset($_POST['class_name']) && isset($_POST['teacher_first_name'])
	 * && isset($_POST['teacher_surname'])){
	 */
	
	// dane do połączenia z bazą
	require_once 'db_connection.php';
	
	// pobranie wartości z formularza
	$class_name = $_POST ['class_name'];
	$teacher_full_name = $_POST ['teacher_full_name'];
	$exploded = explode ( " ", $teacher_full_name );
	$teacher_surname = trim ( $exploded [0] );
	$teacher_first_name = trim ( $exploded [1] );
	
	
	$query = "SELECT * FROM profesores WHERE imie='$teacher_first_name' AND nazwisko='$teacher_surname'";
	/*
	 * if (!$result1 = mysqli_query($con, $query)) {
	 * exit(mysqli_error($con));
	 * }
	 */
	
	$result = mysqli_query ( $con, $query );
	$row = mysqli_fetch_assoc ( $result );
	$teacher_id = $row ['idProfesores'];
	$query = "INSERT INTO przedmioty (nazwaPrzedmiotu,wykladowca,Profesores_idProfesores) 
				VALUES('$class_name','$teacher_full_name','$teacher_id')";
	
	$result = mysqli_query ( $con, $query );
} else {
	echo 'wtf';
}
?>