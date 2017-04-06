<?php 

if(isset($_POST['email'])){
	
	//email information
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	$subject = $_POST['subject'];
	
	//send email
	mail($email,$subject,$comments);
	
	unset($_POST);
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Mailing</title>
</head>
<body>

	
	<form action="mailing.php" method="post">
	
		<label for="name">Name:</label><br>
		<input type="text" name="name" id="name"><br>
		
		<label for="email">Email:</label><br>
		<input type="text" name="email" id="email"><br>
		
		<label for="subject">Subject:</label><br>
		<input type="text" name="subject" id="subject"><br>
		
		<label for="comments">Comments:</label><br>
		<textarea name="comments" id="comments" rows="10" cols="50"></textarea><br>
		
		<input type="submit" name="send" value="Send Message">
	</form>
	
</body>
</html>