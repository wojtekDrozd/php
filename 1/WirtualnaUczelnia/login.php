<?php
session_start ();

if (! isset ( $_POST ['login'] ) && ! isset ( $_POST ['password'] ) && ! isset ( $_POST ['userType'] )) {
	header ( 'Location: index.php' );
	exit ();
}

require_once "connect.php";
try {
	
	// nawiązanie połaczenia
	$connection = new mysqli ( $host, $db_user, $db_password, $db_name );
	
	// połączenie nieudane
	if ($connection->errno != 0) {
		throw new Exception ();
	}	
	// połączenie udane
	else {
		$userType = $_POST ['userType'];																				
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		switch ($userType) {
			case 'admin' :
				header ( 'Location: admin_panel.php' );
				break;
			
			case 'student' :{
				
				if($result = $connection->sprintf("SELECT * FROM '%s' WHERE login='%s'",$userType,$login)){
					$userNum = $result->num_rows;
					
					if($userNum>0){
						$row = $result->fetch_assoc();
						
					}
				}
				
				
			}
			
			case 'teacher' :
				header ( 'Location: teacher_panel.php' );
				break;
		}
	}
} catch ( Exception $e ) {
	
	echo $e->getMessage();
}

?>
