<?php
if (isset ( $_POST ['class_name'] ) && isset ( $_POST ['class_type'] ) 
		&& isset($_POST['date'])) {
	
	//połączenie z bazą
	require_once 'db_connection.php';
	
	// pobranie wartości z formularza
	$class_name = $_POST ['class_name'];
	$class_type = $_POST ['class_type'];
	$date = $_POST['date'];
	
	
	//pobranie id  przedmiotu i pracownika
	$query1 = "SELECT * FROM przedmioty WHERE nazwaPrzedmiotu='$class_name'";
	$result1 = mysqli_query ( $con, $query1 );
	$row1 = mysqli_fetch_assoc ( $result1 );
	$class_id = $row1['idprzedmiot'];
	$teacher_id = $row1['Profesores_idProfesores'];
	
	//pobranie id zajęć
	$query2 = "SELECT * FROM zajecia WHERE nazwa='$class_type'";
	$result2 = mysqli_query ( $con, $query2 );
	$row2 = mysqli_fetch_assoc ( $result2 );
	$class_type_id = $row2['idzajecia'];
	
	//dodanie terminu zajęć do bazy
	$query3 = "INSERT INTO grafik (data,idprzedmiot,idzajecia,idProfesores) 
				VALUES('$date','$class_id ','$class_type_id','$teacher_id')";
	
	$result3 = mysqli_query ( $con, $query3 );
} 
?>