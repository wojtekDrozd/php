<?php
if(isset($_POST)){
	
			require_once 'db_connection.php';
			
			$class_name = $_POST ['class_name'];
			$class_date = $_POST ['class_date'];
			
			$query = "SELECT idprzedmiot FROM przedmioty WHERE nazwaPrzedmiotu='$class_name'";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_assoc($result);
			$class_id = $row['idprzedmiot'];
			$boxesString = $_POST['boxesString'];
			
			$boxesSubstring = substr($boxesString,1);
			$explodedArray1= explode ( "|", $boxesString );
			
			foreach($explodedArray1 as $item){
				
				$explodedItemArray = explode(":",$item);
				$student_id = $explodedItemArray[0];
				$student_status = $explodedItemArray[1];
				
				$query2 = "SELECT * FROM `23999670_dziek`.`obecnosc`
				WHERE `nrAlbumu`='$student_id'
				AND `przedmioty_idprzedmiot`='$class_id'
				AND `data`='$class_date'";
				$result2 = mysqli_query ( $con, $query2 );
				
				if ($row2 = mysqli_fetch_assoc ( $result2 )) {
					$list_id = $row2 ['idObecnosc'];
					$query = "UPDATE `23999670_dziek`.`obecnosc`
					SET `obecny`='$student_status'
					WHERE `idObecnosc`='$list_id'";
					$result = mysqli_query ( $con, $query );
				}else{
				
					$rand = rand(1,1000000);
					$query = "INSERT INTO `23999670_dziek`.`obecnosc`
					(`idObecnosc`, `nrAlbumu`, `przedmioty_idprzedmiot`,`data`, `obecny`)
					VALUES ('$rand', '$student_id', '$class_id','$class_date', '$student_status')";
					$result = mysqli_query($con, $query);
				}
				
			}
			
			
			echo "done";
}
?>