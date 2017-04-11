<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP and MySQL CRUD Operations Demo</title>
 
 <!-- Jquery JS file -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<!-- Bootstrap JS file -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- Custom JS file -->
<script type="text/javascript" src="js/script.js"></script>
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
<body>
 
<!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Dziekanat</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Dodaj studenta</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br/>
             <div class="records_content">
            
            </div>
        </div>
    </div>
</div>
<!-- /Content Section -->
 
 
<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dodaj studenta</h4>
            </div>
            <div class="modal-body">
 
 				 <div class="form-group">
                    <label for="first_name">Nr albumu</label>
                    <input type="text" id="student_id" placeholder="Numer albumu" class="form-control"/>
                </div>
                
                <div class="form-group">
                    <label for="first_name">Imię</label>
                    <input type="text" id="first_name" placeholder="Imię" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="last_name">Nazwisko</label>
                    <input type="text" id="last_name" placeholder="Nazwisko" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="last_name">Kierunek studiów</label>
                    <input type="text" id="major" placeholder="Kierunek studiów" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="last_name">Semestr</label>
                    <input type="text" id="year" placeholder="Semestr" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" placeholder="Email" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="last_name">Pesel</label>
                    <input type="text" id="pesel" placeholder="Pesel" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Zapisz</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
 
<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edytuj</h4>
            </div>
            <div class="modal-body">
 
 				               
                <div class="form-group">
                    <label for="update_first_name">Imię</label>
                    <input type="text" id="update_first_name" placeholder="Imię" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_last_name">Nazwisko</label>
                    <input type="text" id="update_last_name" placeholder="Nazwisko" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="update_major">Kierunek</label>
                    <input type="text" id="update_major" placeholder="Kierunek" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="update_year">Semestr</label>
                    <input type="text" id="update_year" placeholder="Semestr" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_email">Email</label>
                    <input type="text" id="update_email" placeholder="Email" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="update_pesel">Pesel</label>
                    <input type="text" id="update_pesel" placeholder="Pesel" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Zapisz</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
 

</body>
</html>