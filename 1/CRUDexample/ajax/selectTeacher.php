<?php

//select for dropdown form

require_once 'db_connection.php';

$query = "SELECT * FROM profesores";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

//wynik zapytania
if(mysqli_num_rows($result) > 0)
{
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<option>'.$row['nazwisko'].' '.$row['imie'].'</option>';
           
	}
	
	echo '</select>';
	
}
else
{
	// brak rekordów
	echo '<option>Brak wykładowców!</option>';
}
?>