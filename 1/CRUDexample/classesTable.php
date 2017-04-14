<!-- Tabela Studenci-->

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Studenci</title>

<!-- Jquery JS file -->
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript"
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/classScript.js"></script>
<!-- Bootstrap CSS File  -->
<link rel="stylesheet" type="text/css"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<script src="https://www.w3schools.com/lib/w3data.js"></script>

</head>
<body>

	<!-- Admin Menu Section -->
	<div w3-include-html="adminMenuBar.php"></div>
	<script>w3IncludeHTML()</script>
	<!-- /Admin Menu Section -->


	<!-- Content Section -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<br />
					<button class="btn btn-success" data-toggle="modal"
						data-target="#add_new_record_modal">Dodaj przedmiot</button>
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
	<!-- /Content Section -->


	<!-- Bootstrap Modals -->
	<!-- Modal - Add New Record/User -->
	<div class="modal fade" id="add_new_record_modal" tabindex="-1"
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
                    <?php include 'ajax/selectTeacher.php';?>
                </div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
					<button type="button" class="btn btn-primary" onclick="addClassRecord()">Zapisz</button>
				</div>
			</div>
		</div>
	</div>
	<!-- // Modal -->



</body>
</html>