<?php
function get_curl_response($api_url){
	$ch = curl_init();    
	$timeout = 60;    
	curl_setopt($ch, CURLOPT_URL, $api_url);    
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);    
	$result = curl_exec($ch);    
	curl_close($ch);
	return $result;
}

$url = "http://www.glowtouch.com"; //your website

$page_speed_api_key = "AIzaSyCBgCHben7bTtLRf3TA0bAhBtGnBUtRI5Q"; //your API key
$api_url = "https://www.googleapis.com/pagespeedonline/v3beta1/mobileReady?url=".urlencode($url)."&screenshot=false&snapshots=true&fields=id%2CruleGroups&strategy=mobile&key=$page_speed_api_key";

$check = get_curl_response($api_url);

$result = json_decode($check,true);
		
echo '<pre>';  
print_r($result);   
echo '</pre>';

?>