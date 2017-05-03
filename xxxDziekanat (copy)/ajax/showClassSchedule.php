<?php

//wyświetlanie tabeli z planem zajęć

if(isset($_POST['class_name']) && $_POST['class_name'] != ""){
	
	$class_name = $_POST['class_name'];

require_once 'db_connection.php';

$data = <<<EOD
<table class="table table-bordered table-striped">
                        <tr>
                            <th>Data</th>
                            <th>Przedmiot</th>
                            <th>Rodzaj zajęć</th>
                            <th>Prowadzący</th>
							<th>Edytuj</th>
							<th>Usuń</th>
                        </tr>

EOD;

$query = "SELECT grafik.idgrafik,grafik.data, przedmioty.nazwaPrzedmiotu, zajecia.nazwa,profesores.imie,profesores.nazwisko 
			FROM (((grafik INNER JOIN przedmioty ON grafik.idprzedmiot = przedmioty.idprzedmiot)		
		   INNER JOIN zajecia ON grafik.idzajecia = zajecia.idzajecia)
			INNER JOIN profesores ON grafik.idProfesores = profesores.idProfesores)
		WHERE nazwaPrzedmiotu = '$class_name'
		ORDER BY grafik.data ASC";
		
$result = mysqli_query($con, $query);
$counter=0;
while($row=mysqli_fetch_assoc($result)){
	$data .= '<tr>
				<td>'.$row['data'].'</td>
				<td>'.$row['nazwaPrzedmiotu'].'</td>
				<td>'.$row['nazwa'].'</td>
				<td>'.$row['nazwisko'].' '.$row['imie'].'</td>
				<td><button onclick="getClassDateDetails('.$row['idgrafik'].')" class="btn btn-warning btn-xs"><i class="material-icons">mode_edit</i></button></td>
                <td><button onclick="deleteClassDate('.$row['idgrafik'].')" class="btn btn-danger btn-xs"><i class="material-icons">delete</i></button></td>
                </tr>
						
			';
	$counter++;
}

if($counter==0){
	$data .= '<tr><td colspan="6">Brak wyznaczonych terminów zajęć.</td></tr>';
}

$data .= '</table>';

echo $data;

}

?>