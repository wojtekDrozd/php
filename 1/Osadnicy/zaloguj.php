<?php

require_once "connect.php";

//@ wyciszanie błędów, w przypadku błędów php nie będzie wyrzucać/
//na ekran żadnych informacji

$connection = @new mysqli($host, $db_user,$db_password,$db_name);

//połaczenie nieudane
if($connection->connect_errno!=0){
	echo "Error".$connection->connect_errno."Opis:".$connection->connect_error;
}
//połączenie udane
else{
	
	$login = $_POST['login'];
	$password = $_POST['password'];
	
	//w zapytaniu sql zmienne w ' ', inaczej niż w konstrukcji echo
	$sql = "select * from uzytkownicy where user='$login' and pass='$password";
	
	if($rezultat = @$connection->query($sql))
	
	$connection->close();
}


?>