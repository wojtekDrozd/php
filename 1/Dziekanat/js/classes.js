//SKRYPT PRZEDMIOTY

//dodawanie przedmiotu
function addClass() {
	
   //pobranie wartości z formularza
    var class_name = $("#class_name").val();
    var teacher_full_name = $("#teacher_full_name").val();
    
    //przesłanie danych przedmiotu do zapisu
    $.post("ajax/addClass.php", {
    	class_name: class_name,
    	teacher_full_name: teacher_full_name
    }, function (data, status) {
    	
        //zamknięcie formularza
        $("#add_class_modal").modal("hide");
 
        //przeładowanie tabeli przedmioty
        readClassesRecords();
 
        //czyszczenie pól formularza
        $("#class_name").val("");
        $("#teacher_full_name").val("");
        
        location.reload();
       
    });
}
 
//wczytanie tabeli przedmioty
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

//pobranie aktualnych danych przedmiotu do formularza edycji
function getClassDetails(class_id) {
	
	//id przedmiotu dodane do ukrytego pola
	$("#hidden_class_id").val(class_id);
	$.post("ajax/readClassDetails.php", {
            class_id: class_id
        },
        function (data,status) {
                    	
        	var przedmiot = JSON.parse(data);
        	
        	// dodaj dotychczasowe wartości do formularza
            $("#update_class_name").val(przedmiot.nazwaPrzedmiotu);
            $("#update_teacher_full_name").val(przedmiot.wykladowca);
          
        }
    );
    //otwórz formularz
    $("#update_class_modal").modal("show");
}

//edytuj dane przedmiotu
function updateClassDetails() {
	
    //pobranie id przedmiotu z ukrytego pola
	var class_id =  $("#hidden_class_id").val();
	
	// pobranie uaktualnionych wartości
    var class_name = $("#update_class_name").val();
    var teacher_full_name = $("#update_teacher_full_name").val();
 
    //aktualizacja danych w bazie
    $.post("ajax/updateClassDetails.php", {
          
    	class_id: class_id,
    	class_name: class_name,
    	teacher_full_name: teacher_full_name
        },
        function (data, status) {
            
        	// ukryj formularz
            $("#update_class_modal").modal("hide");
            
            //odśwież tabele
            readClassesRecords();
        }
    );
}

function addStudentToClass(){
	
	//pobranie wartości z formularza
	var class_name = $("#class_name2").val();
	var student_full_name = $("#student_full_name2").val();
	
	$.post("ajax/addStudentToClass.php", {
		
		class_name: class_name,
		student_full_name: student_full_name
		
	}, 
	
	function (data,status){
		
		//zamknięcie formularza
		$("#add_student_to_class_modal").modal("hide");
		
		//przeładowanie tabeli przedmioty
		readClassesRecords();
		
		//czyszczenie pól formularza
		/*$("#class_name2").val("sssssss");
		$("#student_full_name2").val("");*/

	});
	
	
}

function showStudentsInClass(){
	
	var class_name = $("#filter_class_name").val();
	
	$.post("ajax/readStudentsInClassRecords.php",{
		
		class_name: class_name
	},
	
	function (data,status){
		
		$(".records_content").html(data);
	}
			
	
	
	);
}

function showClassSchedule(){
	$.get("ajax/showClassSchedule.php",{},function(data,status){
		$(".records_content").html(data);
	});
}

function showAllClasses(){
	readClassesRecords();
}

$(document).ready(function (){
	readClassesRecords();
})













