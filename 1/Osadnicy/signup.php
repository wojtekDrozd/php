<?php
session_start ();

if (isset ( $_POST ['email'] )) {
	
	// udana waliwacha
	$everythingOk = true;
	
	// sprawdzenie poprawności nickname
	$nick = $_POST ['nick'];
	
	// sprawdzenie długości nicka
	if ((strlen ( $nick ) < 3) || (strlen ( $nick ) > 20)) {
		$everythingOk = false;
		$_SESSION ['e_nick'] = "Nick musi posiadać od 3 do 20 znaków";
	}
	// sprawdzenie czy nick jest alfanumeryczny
	if (ctype_alnum ( $nick ) == false) {
		$everythingOk = false;
		$_SESSION ['e_nick'] = "Nick może się składać tylko z liter i cyfr
				(bez polskich znaków)";
	}
	
	// sprawdź poprawność adresu email
	$email = $_POST ['email'];
	$emailSafe = filter_var ( $email, FILTER_SANITIZE_EMAIL );
	
	if ((filter_var ( $emailSafe, FILTER_VALIDATE_EMAIL ) == false) || ($emailSafe != $email)) {
		$everythingOk = false;
		$_SESSION ['e_email'] = "Podaj poprawny adres email";
	}
	
	// sprawdz poprawność hasła
	$pass1 = $_POST ['pass1'];
	$pass2 = $_POST ['pass2'];
	
	if ((strlen ( $pass1 ) < 8) || (strlen ( $pass1 ) > 20)) {
		$everythingOk = false;
		$_SESSION ['e_pass'] = "Hasło powinno mieć od 8 do 20 znaków";
	}
	
	// sprawdzenie czy podane hasła są takie same
	if ($pass1 != $pass2) {
		$everythingOk = false;
		$_SESSION ['e_pass'] = "Podane hasła muszą być identyczne";
	}
	
	// zahashuj hasło
	$passHashed = password_hash ( $pass1, PASSWORD_DEFAULT );
	
	// Czy zaakceptowano regulamin?
	if (! isset ( $_POST ['regulamin'] )) {
		$everythingOk = false;
		$_SESSION ['e_regulamin'] = "Potwierdź akceptację regulaminu";
	}
	
	// czy zaznaczona recaptcha?
	// secret key z google recaptcha admin
	$secretKey = '6LcpHwwUAAAAAFEOkdzJsENbjXbmS1zwKN4-PUVI';
	
	$check = file_get_contents ( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST ['g-recaptcha-response'] );
	
	$response = json_decode ( $check );
	
	if ($response->success == false) {
		$everythingOk = false;
		$_SESSION ['e_bot'] = "Potwierdź, że nie jesteś botem";
	}
	
	//dane zapamiętywane w formularzu
	$_SESSION['fr_nick'] = $nick;
	$_SESSION['fr_email'] = $email;
	$_SESSION['fr_pass1'] = $pass1;
	$_SESSION['fr_pass2'] = $pass2;
	if(isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
	
	
	require_once "connect.php";
	
	//nie rzucaj warning ale tylko wyjątki:
	mysqli_report(MYSQLI_REPORT_STRICT);
	
	
	try{
		
		//@ przes mysqli niepotrzebna bo jest try/catch
		$connection = new mysqli($host, $db_user,$db_password,$db_name);
		
		//błąd połączenia
		if($connection->connect_errno!=0){
			throw new Exception(mysqli_connect_errno());
		}
		
		//sukces połaczenia
		else{
			 
			//Czy istnieje taki mail?
			$result = $connection->query("SELECT id FROM uzytkownicy WHERE email='$email'");
			
			if(!$result) throw new Exception($connection->error);
			$mailNum = $result->num_rows;
			if($mailNum>0){
				$everythingOk = false;
				$_SESSION['e_email'] = "Istnieje już konto o takim adresie email";
			}
			
			//czy jest już taki nick?
			
			$result = $connection->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
			if(!$result) throw new Exception($connection->error);
			
			$userNum = $result->num_rows;
			if($userNum > 0){
				$everythingOk = false;
				$_SESSION['e_nick'] = "Już jest user o takim nicku";
			}
			
			// końcowe sprawdzenie flagi
				if ($everythingOk == true) {
					// wszystkie testy zaliczone. dodajemy gracza do bazy
					
					if($connection->query(
							"INSERT INTO uzytkownicy 
							VALUES (NULL,'$nick','$passHashed','$email',100,100,100,14)")){
							
							$_SESSION['successfulSignUp']=true;
							header('Location: welcome.php');
							
					}else{
						throw new Exception($connection->error);
					}
					
				}
				
			
			$connection->close();
		}
		
	}catch(Exception $e){
		echo '<div class="error">Błąd serwera!Zarejestruj się w innym terminie</div>';
		echo '<br/>Info for devs:'.$e;
	}
	
	
	
}

?>


<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Rejestracja</title>
<script src='https://www.google.com/recaptcha/api.js'></script>
<style>
.error {
	color: red;
	margin-top: 10px;
	margin-bottom: 10px;
}
</style>
</head>
<body>


	<form method="post">

		Nickname: <br />
		<input type="text" value="<?php 
		
		if(isset($_SESSION['fr_nick'])){
			echo $_SESSION['fr_nick'];
			unset($_SESSION['fr_nick']);
		}
		?>" name="nick" /> <br />
		
<!-- komunikat o błędzie -->
<?php
if (isset ( $_SESSION ['e_nick'] )) {
	echo '<div class="error">' . $_SESSION ['e_nick'] . "</div>";
	unset ( $_SESSION ['e_nick'] );
}

?>


Email: <br />
		<input type="text" value="<?php 
		
		if(isset($_SESSION['fr_email'])){
			echo $_SESSION['fr_email'];
			unset($_SESSION['fr_email']);
		}	
		?>" name="email" /><br />


<!-- komunikat o błędzie -->
<?php
if (isset ( $_SESSION ['e_email'] )) {
	echo '<div class="error">' . $_SESSION ['e_email'] . '</div>';
	unset ( $_SESSION ['e_email'] );
}

?>

Hasło: <br />
		<input type="password" value="<?php 
		if(isset($_SESSION['fr_pass1'])){
			echo $_SESSION['fr_pass1'];
			unset($_SESSION['fr_pass1']);
		}
		
		?>"name="pass1" /><br />

<!-- komunikat o błędzie hasła1 -->
<?php
if (isset ( $_SESSION ['e_pass'] )) {
	echo '<div class="error">' . $_SESSION ['e_pass'] . '</div>';
	unset ( $_SESSION ['e_pass'] );
}

?>

Powtórz hasło: <br />
		<input type="password" value="<?php 
		if(isset($_SESSION['fr_pass2'])){
			echo $_SESSION['fr_pass2'];
			unset($_SESSION['fr_pass2']);
		}
		
		?>" name="pass2" /><br />
		<br />

<!-- komunikat o błędzie hasła 2 -->
<?php
if (isset ( $_SESSION ['e_pass'] )) {
	echo '<div class="error">' . $_SESSION ['e_pass'] . '</div>';
	unset ( $_SESSION ['e_pass'] );
}
?>

<label>
<input type="checkbox" name="regulamin" <?php 
if(isset($_SESSION['fr_regulamin'])){
	echo "checked";
	unset($_SESSION['fr_regulamin']);
}

?>/>Akceptuję regulamin<br />	<br />

</label>


<!-- komunikat o błędzie checkboxa -->
<?php
if (isset ( $_SESSION ['e_regulamin'] )) {
	echo '<div class="error">' . $_SESSION ['e_regulamin'] . '</div>';
	unset ( $_SESSION ['e_regulamin'] );
}
?>

<div class="g-recaptcha"
			data-sitekey="6LcpHwwUAAAAAOhB567pUomR2dK67tAKb9ADBDdD"></div>


<!-- komunikat o błędzie -->
<?php

if (isset ( $_SESSION ['e_bot'] )) {
	echo '<div class="error">' . $_SESSION ['e_bot'] . '</div>';
	unset ( $_SESSION ['e_bot'] );
}

?>
<input type="submit" value="Zarejestruj" />
	</form>


</body>
</html>










