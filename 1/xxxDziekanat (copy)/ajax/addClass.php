<?php
if (isset ( $_POST ['class_name'] ) && isset ( $_POST ['teacher_full_name'] )) {
	
	//połączenie z bazą
	require_once 'db_connection.php';
	
	// pobranie wartości z formularza
	$class_name = $_POST ['class_name'];
	$teacher_full_name = $_POST ['teacher_full_name'];
	$exploded = explode ( " ", $teacher_full_name );
	$teacher_surname = trim ( $exploded [0] );
	$teacher_first_name = trim ( $exploded [1] );
	
	//pobranie danych pracownika
	$query = "SELECT * FROM profesores WHERE imie='$teacher_first_name' AND nazwisko='$teacher_surname'";
	
	$result = mysqli_query ( $con, $query );
	$row = mysqli_fetch_assoc ( $result );
	$teacher_id = $row ['idProfesores'];
	
	//dodanie przedmiotu do bazy
	$query = "INSERT INTO przedmioty (nazwaPrzedmiotu,wykladowca,Profesores_idProfesores) 
				VALUES('$class_name','$teacher_full_name','$teacher_id')";
	
	$result = mysqli_query ( $con, $query );
} 
?>