<?php

session_start();

if(isset($_SESSION['pesel']) && $_SESSION['pesel'] != ""){
	
	$pesel = $_SESSION['pesel'];

//połączenie z bazą
require_once 'db_connection.php';

// nagłówek tabeli z danymi studenta
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
                		
}



$query2 = "SELECT * FROM studenci_has_przedmioty WHERE studenci_nr_albumu='$student_id'";
$result2 = mysqli_query($con, $query2);
$row2 = mysqli_fetch_assoc($result2);
$class_id = $row2['przedmioty_idprzedmiot_1'];

$query3 = "SELECT * FROM przedmioty WHERE idprzedmiot='$class_id'";
$result3 = mysqli_query($con, $query3);
$row3 = mysqli_fetch_assoc($result3);
$class_name = $row3['nazwaPrzedmiotu'];
$teacher_name = $row3['wykladowca'];



// nagłówek tabeli z przedmiotami studenta
$data2 = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Przedmiot</th>
                            <th>Prowadzący</th>
                        </tr>
						<tr>
							<td>'.$class_name.'</td>
							<td>'.$teacher_name.'</td>
						</tr>
		</table>';
             



echo $data2;


?>