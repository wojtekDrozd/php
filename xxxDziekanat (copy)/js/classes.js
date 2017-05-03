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

//usuń termin zajęć z planu zajęć
function deleteClassDate(class_date_id){
	var conf =confirm("Czy na pewno chcesz usunąć zajęcia?");
	if(conf == true){
		$.post("ajax/deleteClassDate.php",{
			class_date_id: class_date_id
		},
		function (data,status){
			//przeładuj tabelę
			showClassSchedule();
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

//pobierz dotychczasowe dane dotyczące terminu i typu zajęć do okna edycji
function getClassDateDetails(class_date_id) {

	$("#hidden_class_date_id").val(class_date_id);

	$.post("ajax/readClassDateDetails.php", {
		class_date_id : class_date_id
	},

	function(data, status) {

		// stwórz obiekt z jsona przesłanego ze skryptu
		var class_date = JSON.parse(data);

		// dodanie dotychczasowych wartości do formularza
		
		$("#update_class_name3").val(class_date.nazwaPrzedmiotu);
		$("#update_class_type").val(class_date.nazwa);
		$("#update_date").val(class_date.data);
	});
	
	
	$("#update_class_date_modal").modal("show");
}

// edytuj dane przedmiotu
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

//zapisanie studenta na przedmiot
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
		
		

	});
	
	
}

//pokaż studentów zapisanych na wybranych przedmiot
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

//dodaj teermin i typ zajęć
function addClassDate(){
	
	var class_name = $("#class_name3").val();
	var class_type = $("#class_type").val();
	var date = $("#date").val();
	
	$.post("ajax/addClassDate.php",{
		class_name: class_name,
		class_type: class_type,
		date: date
	},
	
	function (data,status){
		//zamknięcie formularza dodawania terminu zajęć
		$("#add_class_date_modal").modal("hide");
		showClassSchedule();
		
	}
	
	);
}

//edytuj termin i typ zajęć
function updateClassDate(){
	
	var class_date_id = $("#hidden_class_date_id").val();
	
	var class_name = $("#update_class_name3").val();
	var class_type = $("#update_class_type").val();
	var date = $("#update_date").val();
	
	$.post("ajax/updateClassDateDetails.php",{
		class_date_id: class_date_id,
		class_name: class_name,
		class_type: class_type,
		date: date
	},
	function (data,status){
		
		$("#update_class_date_modal").modal("hide");
		showClassSchedule();
	}
	
	);
}

//pokaż plan zajęć dla wybranego przedmiotu
function showClassSchedule(){
	
	
	var class_name = $("#filter_class_name").val();
	
	$.post("ajax/showClassSchedule.php",{
		
		class_name: class_name
		
	},
			
	function(data,status){
		$(".records_content").html(data);
	});
}

//pokaż dziennik dla wybranego przedmiotu
function showClassLog(){
	
	var class_name = $("#filter_class_name").val();
	$.post("ajax/showClassLog.php",{
		class_name: class_name
	},
	function (data,status){
		$(".records_content").html(data);
	}
	);
}

//pokaż wszystkie przedmioty
function showAllClasses(){
	readClassesRecords();
}

//załaduj tabele ze wszystkimi przedmiotami na starcie strony
$(document).ready(function (){
	readClassesRecords();
})































