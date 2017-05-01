<?php

session_start();

if(isset($_SESSION['pesel']) && $_SESSION['pesel'] != ""){
	
	$pesel = $_SESSION['pesel'];

//połączenie z bazą
require_once 'db_connection.php';

// nagłówek tabeli z danymi studenta
$data = '<h3><span class="label label-info" id="mylabel">Moje dane</span></h3><br/><table class="table table-bordered table-striped" id="mytable">
                        <tr>
                            <th>Nr albumu</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Kierunek studiów</th>
							<th>Semestr</th>
							<th>Email</th>
							<th>PESEL</th>
                        </tr>';

$query = "SELECT * FROM studenci WHERE pesel='$pesel'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$student_id =$row['nrAlbumu'];

$data .= '<tr>
                <td>'.$row['nrAlbumu'].'</td>
                <td>'.$row['imie'].'</td>
                <td>'.$row['nazwisko'].'</td>
                <td>'.$row['kierunek'].'</td>
               	<td>'.$row['semestr'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['pesel'].'</td>
            </tr>';

$data .= '</table>';
echo $data;
                		

// nagłówek tabeli z przedmiotami studenta
$data2 = '<h3><span class="label label-info">Moje przedmioty</span></h3><br/><table class="table table-bordered table-striped">
                        <tr>
                            <th>Przedmiot</th>
                            <th>Prowadzący</th>
                        </tr>';

$query2 = "SELECT * FROM studenci_has_przedmioty WHERE studenci_nr_albumu='$student_id'";
$result2 = mysqli_query($con, $query2);

$classes_ids_array = array();
while($row2 = mysqli_fetch_assoc($result2)){
	
	$classes_ids_array[] = $row2['przedmioty_idprzedmiot_1'];
}

//zawartość tabeli z przedmiotami studenta
foreach ($classes_ids_array as $class_id){
	
	$query3 = "SELECT * FROM przedmioty WHERE idprzedmiot='$class_id'";
	$result3 = mysqli_query($con, $query3);
	$row3 = mysqli_fetch_assoc($result3);
	$class_name = $row3['nazwaPrzedmiotu'];
	$teacher_name = $row3['wykladowca'];
	
	$data2 .= '<tr>
							<td>'.$class_name.'</td>
							<td>'.$teacher_name.'</td>
						</tr>';

}

if(count($classes_ids_array) == 0){
	$data2 .= '<tr><td colspan="2">Brak przedmiotów.</td></tr>';
}


		
$data2 .= '</table>';
echo $data2;


// etykieta częście  z obecnościami  studenta
echo '<h3><span class="label label-info" id="mylabel">Moje obecności</span></h3><br/>';
	

//zawartość tabeli z przedmiotami studenta
foreach ($classes_ids_array as $class_id){

	$query3 = "SELECT * FROM przedmioty WHERE idprzedmiot='$class_id'";
	$result3 = mysqli_query($con, $query3);
	$row3 = mysqli_fetch_assoc($result3);
	$class_name = $row3['nazwaPrzedmiotu'];

	$data5 = '<table class="table table-bordered table-striped">
                        <tr>
                            <th colspan="4">'.$class_name.'</th></tr>';

	echo $data5;
	
	$query = "SELECT * FROM lista_obecnosci WHERE przedmioty_idprzedmiot=$class_id";
	$result = mysqli_query($con, $query);
	$dates = array();
	while($row = mysqli_fetch_assoc($result)){
		$dates[] = $row['przedmiot_data'];
	}
	
	$dates = array_unique($dates);
	$data7 = '<tr>';
	
	foreach($dates as $date){
			$data7 .= '<th>'.$date.'</th>';
	}
	
	if(count($dates) ==0){
		$data7 .= '<th><h6>Brak wyznaczonych terminów zajęć.</h6></th>';
	}
	
	$data7 .='</tr><tr>';
	
	foreach($dates as $date){
	$query = "SELECT * FROM lista_obecnosci WHERE nrAlbumu='$student_id' AND przedmiot_data='$date'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	
	if($row['obecny'] == 1){
		$data .='<td><i class=" icon-ok" id="myok"></td>';
	} else {
		$data .='<td><i class="icon-cancel" id="mynotok"></td>';
	}
	}
	
	
	
	$data7 .= '</tr></table>';
	
	echo $data7;
	
	
}

// nagłówek tabeli z ocenami  studenta
$data3 = '<h3><span class="label label-info">Moje oceny</span></h3><br/>
		<table class="table table-bordered table-striped">
                        <tr>
                            <th>Przedmiot</th>
                            <th>Test 1</th>
		 					<th>Test 2</th>
							<th>Zaliczenie</th>
							<th>Egzamin</th>
                        </tr>';

//zawartość tabeli z ocenami studenta
foreach ($classes_ids_array as $class_id){

	$query3 = "SELECT * FROM przedmioty WHERE idprzedmiot='$class_id'";
	$result3 = mysqli_query($con, $query3);
	$row3 = mysqli_fetch_assoc($result3);
	$class_name = $row3['nazwaPrzedmiotu'];
	$teacher_name = $row3['wykladowca'];

	$data3 .= '<tr>
							<td>'.$class_name.'</td>
							<td>'.rand(2,5).".0".'</td>
							<td>'.rand(2,5).".0".'</td>
							<td>'.rand(2,5).".0".'</td>
							<td>'.rand(2,5).".0".'</td>
						</tr>';

}

if(count($classes_ids_array) == 0){
	$data3 .= '<tr><td colspan="2">Brak przedmiotów.</td></tr>';
}

$data3 .= '</table>';
echo $data3;
}



?>


















