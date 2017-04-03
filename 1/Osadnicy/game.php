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
		<br />
		<br />
		Masz na koncie <b>{$_SESSION['drewno']}</b> drewna, 
			<b>{$_SESSION['kamien']}</b> kamienia oraz
			<b>{$_SESSION['zboze']}</b> zboża.<br/>
		Data wygaśnięcia premium: <strong>{$_SESSION['dnipremium']}</strong> dni premium.<br/>
		Twój email to <b>{$_SESSION['email']}</b>
		<br />
EOD;
		

$dateTime = new DateTime('2117-04-05 15:59:00');

echo "Data i czas serwera: ".$dateTime->format('Y-m-d H:i:s')."<br/>";

$end = DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION['dnipremium']);

$diff = $dateTime->diff($end);

if($dateTime<$end){
	echo "Pozostało premium: ".$diff->format('%y lat %m miesięcy %d dni %h godzin %i minut %s sekund');
} else{
	echo "Premium nieaktywne od: ".$diff->format('%y lat, %m miesiecy %d dni, %h godzin, %i minut %s sekund');
}

?>
</body>
</html>






























