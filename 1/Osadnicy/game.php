<?php 

session_start();

//jeśli user nie jest zalogowany
if(!isset($_SESSION['signed'])){
	header('Location: index.php');
	exit();
}

?>


<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - graj online!</title>
</head>
<body>

<?php 

echo<<<EOD
		<p>Witaj {$_SESSION['user']} !</p>
		
		<form action="logout.php">
		<input type="submit" value="Wyloguj" />
		</form>
		
		
		Masz na koncie <b>{$_SESSION['drewno']}</b> drewna, 
			<i>{$_SESSION['kamien']}</i> kamienia oraz
			<u>{$_SESSION['zboze']}</u> zboża.<br/>
			
		Pozostało ci <strong>{$_SESSION['dnipremium']}</strong> dni premium.<br/>
		
		Twój email to <b>{$_SESSION['email']}</b>

EOD;

?>
</body>
</html>




