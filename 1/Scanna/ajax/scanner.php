<?php
require_once 'db_connection.php';

if (isset($_POST ['url'])&& isset ( $_POST ['regex'] ) && isset ( $_POST ['name_capture_group'] )) {
	
	$url = $_POST ['url'];
	$regex = $_POST ['regex'];
	$name_capture_group = $_POST ['name_capture_group'];
	
	if (isset ( $_POST ['extra_capture_group'] )) {
		$extra_capture_group = $_POST ['extra_capture_group'];
	}
	
	if (isset ( $_POST ['website_capture_group'] )) {
		$website_capture_group = $_POST ['website_capture_group '];
	}
	
	if (isset ( $_POST ['name_prefix'] )) {
		$name_prefix = $_POST ['name_prefix '];
	}
	
	if (isset ( $_POST ['text_blob'] )) {
		$text_blob = $_POST ['text_blob'];
	}
	
	if (isset ( $_POST ['name_suffix'] )) {
		$name_suffix = $_POST ['name_suffix'];
	}
	if (isset ( $_POST ['url_prefix'] )) {
		$url_prefix = $_POST ['url_prefix'];
	}
	
	$query = "INSERT INTO products (name,extra,website)
	VALUES('$name_capture_group','$regex','$url')";
	
	$result = mysqli_query ( $con, $query );
	
}

?>