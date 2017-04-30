<?php

if(isset($_POST['class_name']) && $_POST['class_name'] != ""){
	
	//połączenie z bazą
	require_once 'db_connection.php';
	$class_name = $_POST['class_name'];
	
	//nagłówek tabeli lista obecności
	$data = <<<EOD
	<table class="table table-bordered table-striped">
			<tr>
				<th colspan="7">$class_name</th>
			</tr>
			<tr>
				<th>Nr albumu</th>
				<th>Nazwisko</th>
				<th>Imię</th>
EOD;
	
	$query ="SELECT * FROM ((grafik INNER JOIN przedmioty ON grafik.idprzedmiot=przedmioty.idprzedmiot)
	INNER JOIN zajecia ON grafik.idzajecia=zajecia.idzajecia)
			WHERE nazwaPrzedmiotu='$class_name' ORDER BY data ASC";
	$result = mysqli_query($con, $query);
	
	while($row=mysqli_fetch_assoc($result)){
		$data .= '<th>'.$row['data'].' ('.$row['nazwa'].') '.'</th>';
	}
	mysqli_free_result($result);
	$data .='</tr>';
	
	$query = "SELECT * FROM ((studenci_has_przedmioty 
			INNER JOIN przedmioty 
			ON studenci_has_przedmioty.przedmioty_idprzedmiot_1 = przedmioty.idprzedmiot)
			INNER JOIN studenci ON studenci_has_przedmioty.studenci_nr_albumu=studenci.nrAlbumu)
			WHERE nazwaPrzedmiotu='$class_name'";
			


	$result = mysqli_query($con, $query);
	while($row=mysqli_fetch_assoc($result)){
		$data .= '<tr>
				<td>'.$row['nrAlbumu'].'</td>
				<td>'.$row['nazwisko'].'</td>
				<td>'.$row['imie'].'</td>
                </tr>
	
			';
	}
	
	$data .= '</table>';
	
	echo $data;	
}
?>