<!-- Tabela przedmioty-->

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Przedmioty</title>

<!-- Jquery JS   -->
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap JS   -->
<script type="text/javascript"
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom JS   -->
<script type="text/javascript" src="js/classes.js"></script>
<!-- Bootstrap CSS    -->
<link rel="stylesheet" type="text/css"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<!-- Google Material Icons -->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- W3Data JS -->
<script src="https://www.w3schools.com/lib/w3data.js"></script>


</head>
<body>

	<!-- nawigacja admina -->
	<div w3-include-html="adminMenuBar.php"></div>
	<script>w3IncludeHTML()</script>
	<!-- /nawigacja admina -->


	<!-- Tabela przedmioty -->
	<div class="container">
	
		<div class="row">
		
		<div class="col-md-12">
				<div class="button-group">
					<button type="button" class="btn btn-success" onclick="showAllClasses()">Wszystkie przedmioty</button>
					<button class="btn btn-success" data-toggle="modal" data-target="#add_class_modal">Dodaj przedmiot do bazy</button>
					<button class="btn btn-success" data-toggle="modal" data-target="#add_student_to_class_modal">Zapisz studenta na przedmiot</button>
				</div>
		</div>
		</div>
		
		<br />
		<div class="row">
			<div class="col-md-3">
				<div class="button-group">
					<select class="form-control" id="filter_class_name"> <?php include 'ajax/selectClass.php';?> </select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="button-group">
  					<button type="button" class="btn btn-info" onclick="showStudentsInClass()">Pokaż zapisanych studentów</button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<br />
				<div class="records_content"></div>
			</div>
		</div>
	</div>

	<!-- /Tabela przedmioty  -->


	<!-- Bootstrap Modals -->
	<!-- Modal - Dodawanie przedmiotu -->
	<div class="modal fade" id="add_class_modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Dodaj przedmiot</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="class_name">Nazwa przedmiotu</label> <input
							type="text" id="class_name" placeholder="Nazwa przedmiotu"
							class="form-control" />
					</div>

					<div class="form-group">
						<label for="select_teacher">Prowadzący</label> <select
							class="form-control" id="teacher_full_name"><?php include 'ajax/selectTeacher.php';?></select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
					<button type="button" class="btn btn-primary" onclick="addClass()">Zapisz</button>
				</div>
			</div>
		</div>
	</div>
	<!-- // Modal dodawanie przedmiotu-->

	<!-- Modal edycja przedmiotu -->
	<div class="modal fade" id="update_class_modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Edytuj</h4>
				</div>
				<div class="modal-body">


					<div class="form-group">
						<label for="update_class_name">Nazwa przedmiotu</label> <input
							type="text" id="update_class_name" placeholder="Nazwa przedmiotu"
							class="form-control" />

					</div>
					<div class="form-group">
						<label for="update_teacher_full_name">Prowadzący</label> <select
							class="form-control" id="update_teacher_full_name">
                    <?php include 'ajax/selectTeacher.php';?>
                    </select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
					<button type="button" class="btn btn-primary"
						onclick="updateClassDetails()">Zapisz</button>
					<input type="hidden" id="hidden_class_id">
				</div>
			</div>
		</div>
	</div>
	<!-- // Modal edycja przedmiotu-->

	<!-- Modal - Dodawanie studenta do przedmiotu -->
	<div class="modal fade" id="add_student_to_class_modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Zapisz studenta na
						przedmiot</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="select_class">Przedmiot</label> <select
							class="form-control" id="class_name2"><?php include 'ajax/selectClass.php';?></select>
					</div>

					<div class="form-group">
						<label for="select_student">Student</label> <select
							class="form-control" id="student_full_name2"><?php include 'ajax/selectStudent.php';?></select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
					<button type="button" class="btn btn-primary"
						onclick="addStudentToClass()">Zapisz</button>
				</div>
			</div>
		</div>
	</div>
	<!-- // Modal dodawanie przedmiotu-->



</body>
</html>