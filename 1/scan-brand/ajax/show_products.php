<?php

//WORKING
// połączenie z bazą
error_reporting(0);
require_once 'db_connection.php';

// nagłówek tabeli przedmioty
$data = '<table class="table table-bordered table-striped" id="mytab">
                        <tr>
							<th><input type="checkbox"><t/h>
							<th>No.</th>
                            <th>Name</th>
                            <th>Extra</th>
                            <th>Website</th>
                        </tr>';

$query = "SELECT * FROM fetchedproducts";
$number=1;

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

// zawartość tabeli przedmioty
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data .= '<tr>
				<td><input type="checkbox"></td>
				<td>'.$number++.'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['extra'].'</td>
                <td><a href="'.$row['url'].'">'.$row['url'].'</a></td>
                </tr>';
	}

}
else
{
	//brak rekordów
	$data .= '<tr><td colspan="6">No products fetched.</td></tr>';
}

$data .= '</table>';

echo $data;



?>