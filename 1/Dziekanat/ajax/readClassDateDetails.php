<?php


//połączenie z bazą
require_once 'db_connection.php';

if(isset($_POST['class_date_id']) && isset($_POST['class_date_id']) != "")
{
	$class_date_id = $_POST['class_date_id'];

	//pobranie danych terminu zajęć
	$query = "SELECT grafik.idgrafik,grafik.data, przedmioty.nazwaPrzedmiotu, zajecia.nazwa,profesores.imie,profesores.nazwisko
	FROM (((grafik INNER JOIN przedmioty ON grafik.idprzedmiot = przedmioty.idprzedmiot)
	INNER JOIN zajecia ON grafik.idzajecia = zajecia.idzajecia)
	INNER JOIN profesores ON grafik.idProfesores = profesores.idProfesores)
	WHERE idgrafik = '$class_date_id'";
	
	$result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
    //zakodowanie danych do jsona
	$response= json_encode($row);
	
	echo $response;
	
}

?>