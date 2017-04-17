
//scan website
function scanWebsite(){
	
	//pobranie wartości z fomrularza
	var url = $("#url").val();
	var regex = $("#regex").val();
	var name_capture_group = $("#name_capture_group").val();
	var text_blob = $("#text_blob").val();
	var name_prefix = $("#name_prefix").val();
	var name_suffix = $("#name_suffix").val();
	var url_prefix = $("#url_prefix").val();
	var extra_capture_group =$("#extra_capture_group").val();
	var website_capture_group = $("#website_capture_group").val();
	
	
	$.post("ajax/scanner.php", {
		
		url: url,
		regex: regex,
		name_capture_group: name_capture_group,
		text_blob:text_blob,
		name_prefix: name_prefix,
		name_suffix: name_suffix,
		url_prefix: url_prefix,
		extra_capture_group: extra_capture_group,
		website_capture_group: website_capture_group
		
		
	}, function (data, status) {
        showProducts();
    });
	
}

//working
function showProducts(){
	
	
	$.get("ajax/show_products.php", {}, function (data, status) {
        $(".results").html(data);
    });
	
}












