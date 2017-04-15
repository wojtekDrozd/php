
//dodawanie przedmiotu
function addClass() {
	
   //pobranie wartości z formularza
    var class_name = $("#class_name").val();
    var teacher_full_name = $("#teacher_full_name").val();
   /* var spaceIndex = teacher_full_name.indexOf(" ");
    var teacher_first_name = teacher_full_name.substr(0,spaceIndex);
    var teacher_surname = teacher_full_name.substr(spaceIndex+1);*/
    
    //zapisanie studenta
    $.post("ajax/addClass.php", {
    	class_name: class_name,
    	teacher_full_name: teacher_full_name
    	/*teacher_first_name: teacher_first_name,
    	teacher_surname:teacher_surname*/
    }, function (data, status) {
    	
        //zamknięcie popup
        $("#add_new_record_modal").modal("hide");
 
        //przeładuj tabelę
        readClassesRecords();
 
        //wyczyść popup
        $("#class_name").val("");
        $("#teacher_full_name").val("");
    });
}
 
//wczytanie tabeli
function readClassesRecords() {
    $.get("ajax/readClassesRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
 

//usuwanie przedmiotu
function deleteClass(class_id) {
    var conf = confirm("Czy na pewno chcesz usunąć przedmiot?");
    if (conf == true) {
        $.post("ajax/deleteClass.php", {
                class_id: class_id
            },
            function (data, status) {
                //przeładuj tabelę
                readClassesRecords();
            }
        );
    }
}
 
function getClassDetails(class_id) {
    // Add User ID to the hidden field for furture usage
    //$("#hidden_user_id").val(id);
   
	$.post("ajax/readClassDetails.php", {
            class_id: class_id
        },
        function (data, status) {
                    	
        	// PARSE json data
        	var przedmiot = JSON.parse(data);
            
            // dodaj aktualnie wartości do modala
            $("#update_class_name").val(przedmiot["nazwaPrzedmiotu"]);
            $("#update_teacher_full_name").val(przedmiot["wykladowca"]);
          
        }
    );
    //otwórz popup
    $("#update_class_modal").modal("show");
}

//edytuj dane przedmiotu
function UpdateClassDetails() {
	
    // get values
	var student_id = $("#update_student_id").val();
    var first_name = $("#update_first_name").val();
    var last_name = $("#update_last_name").val();
  
 
    // get hidden field value
    var id = $("#hidden_user_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("ajax/updateClassDetails.php", {
           
    		id:id,
    		student_id: student_id,
            first_name: first_name,
            last_name: last_name,
            major: major,
            year: year,
            email: email,
            pesel: pesel
        },
        function (data, status) {
            // hide modal popup
            $("#update_class_modal").modal("hide");
            
            // reload Users by using readRecords();
            readRecords();
        }
    );
}
 
$(document).ready(function () {
    //załaduj tabelę przy starcie strony
    readClassesRecords(); 
});