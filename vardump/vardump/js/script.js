function enter(){
	
	$.get("ajax/test.php",{},function(data,status){
		$("#loadhere").html(data);
	});
}

audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
	
