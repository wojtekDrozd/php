<?php


//ładowanie wszystkich studentów danego pracownika

session_start();

if (isset($_SESSION['pesel']) && $_SESSION['pesel'] != "" ){
	
	$teacher_pesel = $_SESSION['pesel'];
	
	require_once 'db_connection.php';
	
	$query1 = "SELECT * FROM profesores WHERE pesel='$teacher_pesel'";
	$result1 = mysqli_query($con,$query1);
	$row1 = mysqli_fetch_assoc($result1);
	$teacher_id = $row1['idProfesores'];
	
	
	$query2 = "SELECT * FROM przedmioty WHERE Profesores_idProfesores='$teacher_id'";
	$result2 = mysqli_query($con,$query2);
	$classes_ids_array = array();
	while($row2 = mysqli_fetch_assoc($result2)){
	
		$classes_ids_array[] = $row2['idprzedmiot'];
	}
	
	$students_ids_array = array();
	
	foreach ($classes_ids_array as $class_id){
		$query3 = "SELECT * FROM studenci_has_przedmioty WHERE przedmioty_idprzedmiot_1='$class_id'";
		$result3 = mysqli_query($con,$query3);
		$row3 = mysqli_fetch_assoc($result3);
		$students_ids_array[] = $row2['studenci_nr_albumu'];
	}
	
	
	
	$row3 = mysqli_fetch_assoc($result3);
	
	$data .= '<tr>
                <td>'.$row3['nrAlbumu'].'</td>
                <td>'.$row3['imie'].'</td>
                <td>'.$row3['nazwisko'].'</td>
                <td>'.$row3['kierunek'].'</td>
               	<td>'.$row3['semestr'].'</td>
                <td>'.$row3['email'].'</td>
                <td>'.$row3['pesel'].'</td>
            </tr>';
	
	
	
}

if (isset($_POST['class_name']) && $_POST['class_name'] != ""){
	
	
	require_once 'db_connection.php'; 
	
	// nagłówek tabeli studenci
	$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Nr albumu</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Kierunek studiów</th>
							<th>Semestr</th>
							<th>Email</th>
							<th>PESEL</th>
                        </tr>';
	
	$class_name = $_POST['class_name'];
	
	$query1 = "SELECT * FROM przedmioty WHERE nazwaPrzedmiotu='$class_name'";
	$result1 = mysqli_query($con,$query1);
	$row1 = mysqli_fetch_assoc($result1);
	$class_id = $row1['idprzedmiot']; 
	
	$query2 = "SELECT * FROM studenci_has_przedmioty WHERE przedmioty_idprzedmiot_1='$class_id'";
	$result2 = mysqli_query($con,$query2);
	
	$students_ids_array = array();
	while($row2 = mysqli_fetch_assoc($result2)){
		
		$students_ids_array[] = $row2['studenci_nr_albumu'];
	}
	
	
	foreach ($students_ids_array as $student_id){
	$query3 = "SELECT * FROM studenci WHERE nrAlbumu='$student_id'";
	$result3 = mysqli_query($con,$query3);
	
	$row3 = mysqli_fetch_assoc($result3);
	
	$data .= '<tr>
                <td>'.$row3['nrAlbumu'].'</td>
                <td>'.$row3['imie'].'</td>
                <td>'.$row3['nazwisko'].'</td>
                <td>'.$row3['kierunek'].'</td>
               	<td>'.$row3['semestr'].'</td>
                <td>'.$row3['email'].'</td>
                <td>'.$row3['pesel'].'</td>
            </tr>';
	}
	
	if (count($students_ids_array) == 0){
		$data .= '<tr><td colspan="7">Brak studentów zapisanych na wybrany przedmiot.</td></tr>';
	}
	
	$data .= '</table>';
	
	echo $data;
	
	
}
?>