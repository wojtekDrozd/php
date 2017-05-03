<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel Studenta</title>
 
	<!-- jquery js  -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 
	<!-- bootstrap js  -->
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- bootstrap css   -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	
	<!-- custom js   -->
	<script type="text/javascript" src="js/studentPanel.js"></script>
	
	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!--  fontello css -->
	<link rel="stylesheet" type="text/css" href="fontello-eebb1043/css/fontello.css"/>
	
	<!-- W3Data JS -->
	<script src="https://www.w3schools.com/lib/w3data.js"></script>
</head>
<body>
	 
	<!--  Pasek nawigacji -->
	<div w3-include-html="studentMenuBar.php"></div> 
	<script>w3IncludeHTML()</script>
	<!-- /Pasek nawigacji  -->
	
	<!-- tabela podsumowanie studenta -->
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            <br/>
	             <div class="student_summary">
	            </div>
	        </div>
	    </div>
	</div>
	<!-- /tabela podsumowanie studenta -->
</body>
</html>