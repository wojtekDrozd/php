<?php
session_start ();
if((isset($_SESSION['signed'])) && ($_SESSION['signed'] == true)){
	header('Location: game.php');
	//domyślnie cały poniższy kod jest do wykonania dlatego potrzebna jest 
	//instrukcja:
	exit();
}


?>


<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8" />
<title>Osadnicy - graj online</title>
</head>
<body>

	Tylko martwi ujrzeli koniec wojny - Platon
	<br />
	<br />
	

	<form action="login.php" method="post">
		Login: <br /> <input type="text" name="login" /><br /> 
		Password: <br /><input type="password" name="password" /><br /> <br /> 
		<input type="submit" value="Zaloguj się" /><br />
	</form>
	
	<br />

	<?php

if (isset ( $_SESSION ['error'] )) {
	echo $_SESSION ['error'];
	unset($_SESSION['error']);
}

?>
	<br />
	<br/>
	
	<form action="signup.php" method="post">
	<input type="submit" value="Zarejestruj"/>
	</form>
	

</body>
</html>























