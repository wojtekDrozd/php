<?php
// include Database connection file
require_once 'db_connection.php';

// check request
if (isset ( $_POST )) {
	// pobranie wartości
	$id = $_POST['id'];
	$student_id = $_POST ['student_id'];
	$first_name = $_POST ['first_name'];
	$last_name = $_POST ['last_name'];
	$major = $_POST ['major'];
	$year = $_POST ['year'];
	$email = $_POST ['email'];
	$pesel = $_POST ['pesel'];
	
	// edycja danych studenta
	$query = "UPDATE studenci SET nr_albumu = '$student_id',
	imie = '$first_name', 
	nazwisko = '$last_name', 
	kierunek_studiow = '$major',
	semestr = '$year',
	email = '$email',
	pesel = '$pesel'
	WHERE pesel = '$pesel'";
	
	if (! $result = mysqli_query ( $con, $query )) {
		exit ( mysqli_error ( $con ) );
	}
}
?>