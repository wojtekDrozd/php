<?php
$name_capture_group =2;
$website_capture_group =1;


$url = 'http://www.ray-ban.com/usa/sunglasses/view-all/plp';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$urlContent = curl_exec($ch);


$regex = '@href="([^"]+)"\s+class="D_PLP_Tiles"\s+data-description="([^"]+)">@';  

preg_match_all($regex, $urlContent, $matches);

//echo "<pre>",var_dump($matches),"</pre>";

$linksArray = $matches[$website_capture_group];
$productNamesArray = $matches[$name_capture_group];



foreach ($linksArray as $link){
	
	echo $link,"<br/>";
		
}

//echo ucwords(strtolower($match)),"<br/>";

?>