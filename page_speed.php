<?php


$myKEY = "AIzaSyCBgCHben7bTtLRf3TA0bAhBtGnBUtRI5Q";
$url = "http://glowtouch.com";
$url_req = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url='.$url.'&key='.$myKEY;

$url_mobile = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url='.$url.'&screenshot=true&key='.$myKEY.'&strategy=mobile';
$url_desktop = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url='.$url.'&screenshot=true&key='.$myKEY.'&strategy=desktop';
   
$pageSpeed = checkPageSpeed($url_req);
$mobileSpeed = checkPageSpeed($url_mobile);
$desktopSpeed = checkPageSpeed($url_desktop);

echo '<pre>';
print_r(json_decode($desktopSpeed,true)); 
//echo '';
/*
$objMobile = json_decode($mobileSpeed, true);
echo $objMobile['score'];
echo "=====";
$objDesktop = json_decode($desktopSpeed, true);
echo $objDesktop['score'];
*/
function checkPageSpeed($url){  
  if (function_exists('file_get_contents')) {  
    $result = @file_get_contents($url);  
  }  
  if ($result == '') {  
    $ch = curl_init();  
    $timeout = 60;  
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
    $result = curl_exec($ch);  
    curl_close($ch);  
  }  

  return $result;  
}
?>