//dodawanie pracownika
function addTeacher() {
	
   //pobranie wartości z formularza 
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var faculty = $("#faculty").val();
    var email = $("#email").val();
    var pesel = $("#pesel").val();
    
    //zapisanie danych pracownika
    $.post("ajax/addTeacher.php", {
    	first_name: first_name,
        last_name: last_name,
        faculty: faculty,
        email: email,
        pesel: pesel
    }, function (data, status) {
    	
        //zamknięcie popup
        $("#add_new_record_modal").modal("hide");
 
        //przeładuj tabelę
        readTeachersRecords();
 
        //wyczyść popup
        $("#first_name").val("");
        $("#last_name").val("");
        $("#mafaculty").val("");
        $("#email").val("");
        $("#pesel").val("");
    });
}
 
//wczytanie tabeli
function readTeachersRecords() {
    $.get("ajax/readTeachersRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
 

//usuwanie pracownika
function deleteTeacher(pesel) {
    var conf = confirm("Czy na pewno chcesz usunąć pracownika?");
    if (conf == true) {
        $.post("ajax/deleteTeacher.php", {
                pesel: pesel
            },
            function (data, status) {
                
            	//przeładuj tabelę pracowników
                readTeachersRecords();
            }
        );
    }
}

//pobranie aktualnych danych praciwnika do modala edycji
function getTeacherDetails(teacher_id) {
    
	
    $("#hidden_teacher_id").val(teacher_id);
    $.post("ajax/readTeacherDetails.php", {
            teacher_id: teacher_id
    },
        function (data, status) {
            // PARSE json data
        	
            var teacher = JSON.parse(data);
            
            // odaj aktualne wartości do modala
            $("#update_first_name").val(teacher.imie);
            $("#update_last_name").val(teacher.nazwisko);
            $("#update_faculty").val(teacher.katedra);
            $("#update_email").val(teacher.email);
            $("#update_pesel").val(teacher.pesel);
         
        }
    );
    //otwórz popup
    $("#update_user_modal").modal("show");
}

//edytuj dane pracownika
function updateTeacherDetails() {
	
    // pobranie uaktyalnioncyh wartości
	var teacher_id = $("#hidden_user_id").val();
	var first_name =  $("#update_first_name");
    var last_name =  $("#update_last_name");
    var faculty =  $("#update_faculty");
    var email = $("#update_email");
    var pesel = $("#update_pesel");
  
 
  //aktualizacja danych w bazie
    $.post("ajax/updateTeacherDetails.php", {
           
    	  teacher_id: teacher_id,
    	  first_name: first_name,
          last_name: last_name,
          faculty: faculty,
          email: email,
          pesel: pesel
        },
        function (data, status) {
            
        	//ukryj modal
            $("#update_teacher_modal").modal("hide");
            
            //odśwież tabele
            readTeachersRecords();
        }
    );
}
 
$(document).ready(function () {
    //załaduj tabelę przy starcie strony
    readTeachersRecords(); 
});