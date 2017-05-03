<?php

// Generowanie opcji do wyboru dla selecta w panelu pracownika
// widoczne przedmioty tylko zalogowanego nauczyciela
session_start ();

if (isset ( $_SESSION ['pesel'] ) && $_SESSION ['pesel'] != "") {
	
	$teacher_pesel = $_SESSION ['pesel'];
	
	// połączenie z bazą
	require_once 'db_connection.php';
	
	$query1 = "SELECT * FROM profesores WHERE pesel='$teacher_pesel'";
	$result1 = mysqli_query($con,$query1);
	$row1 = mysqli_fetch_assoc($result1);
	$teacher_id = $row1['idProfesores'];
	
	$result1->free();
	
	$query2 = "SELECT * FROM przedmioty WHERE Profesores_idProfesores='$teacher_id' ORDER BY nazwaPrzedmiotu";
	$result2 = mysqli_query($con,$query2);
	
	while($row2 = $result2->fetch_assoc()){
		echo '<option>' . $row2['nazwaPrzedmiotu']. '</option>';
	}
}

?>
