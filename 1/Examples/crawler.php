<?php

$toCrawl = "http://www.wiggle.co.uk/run/cushion-running-shoes/";

function getLinks($url){

	$matches = array();
	$input = @file_get_contents($url);
	$regex = '<a[\s\t]+class="bem-product-thumb__image-link--grid"[\s\t]*href=["\']([^"\']+)["]\s+.*?title="([^"]+)">';
	preg_match_all("/$regex/siU",$input,$matches);

	var_dump($matches);

}

getLinks($toCrawl);

/*
 $filename = 'abc.txt';
 $file = fopen($filename, 'r');
 $output = fread($file, filesize($filename));
 fclose($file);
 echo (nl2br("stirng1\n awesome word \n heheh \n last"));

 */


?>