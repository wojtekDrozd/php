//SKRYPT STUDENTS PANEL


//wczytanie tabeli studenci
function readStudentsRecords() {
    $.get("ajax/StudentSummary.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
 

//pobranie danych studenta do edycji
function getStudentDetails(student_id) {

	//nr albumu studenta dodany do ukrytego pola
	$("#hidden_student_id").val(student_id);
    $.post("ajax/readStudentDetails.php", {
    	student_id: student_id
        },
        function (data, status) {
        	
            var student = JSON.parse(data);
            
            //dodanie dotychczasowych wartości do pól formularza
            $("#update_first_name").val(student.imie);
            $("#update_last_name").val(student.nazwisko);
            $("#update_major").val(student.kierunek);
            $("#update_year").val(student.semestr);
            $("#update_email").val(student.email);
            $("#update_pesel").val(student.pesel);
        }
    );
    //pokazanie formularza
    $("#update_student_modal").modal("show");
}

//edycja dane studenta
function updateStudentDetails() {
	
	//pobranie numeru albumu z ukrytego pola
    var student_id = $("#hidden_student_id").val();
    
    //pobranie zedytowanych wartości 
    var first_name = $("#update_first_name").val();
    var last_name = $("#update_last_name").val();
    var major = $("#update_major").val();
    var year = $("#update_year").val();
    var email = $("#update_email").val();
    var pesel = $("#update_pesel").val();
 
 
    //przesłanie zedytowanych danych 
    $.post("ajax/updateStudentDetails.php", {
           
		student_id : student_id,
		first_name : first_name,
		last_name : last_name,
		major : major,
		year : year,
		email : email,
		pesel : pesel
        },
        function (data, status) {
        	
            // schowanie formularza 
            $("#update_student_modal").modal("hide");
           
            // przeładowanie tabeli studenci
            readStudentsRecords();
        }
    );
}
 
$(document).ready(function () {
    //załaduj tabelę studenci przy starcie strony
	readStudentSummary();
});