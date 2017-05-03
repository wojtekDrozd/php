<?php

//połączenie z bazą
require_once 'db_connection.php';

// nagłówek tabeli pracownicy
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Nazwisko</th>
                            <th>Imię</th>
                            <th>Katedra</th>
							<th>Email</th>
							<th>PESEL</th>
                            <th>Edytuj</th>
                            <th>Usuń</th>
                        </tr>';

$query = "SELECT * FROM profesores ORDER BY nazwisko ASC";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

//zawartość tabeli pracownicy
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data .= '<tr>
                <td>'.$row['nazwisko'].'</td>
                <td>'.$row['imie'].'</td>
                <td>'.$row['katedra'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['pesel'].'</td>
                <td><button onclick="getTeacherDetails('.$row['idProfesores'].')" class="btn btn-warning btn-xs"><i class="material-icons">mode_edit</i></button></td>
                <td><button onclick="deleteTeacher('.$row['idProfesores'].')" class="btn btn-danger btn-xs"><i class="material-icons">delete</i></button></td>
            </tr>';
	}
}
else
{
	// brak pracowników w bazie
	$data .= '<tr><td colspan="6">Brak pracowników w bazie.</td></tr>';
}

$data .= '</table>';

echo $data;
?>