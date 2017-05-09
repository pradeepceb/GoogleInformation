<?php
function getinboundLinks($domain_name) {
	ini_set('user_agent', 'NameOfAgent (http://localhost)');
	$url = $domain_name;
	$url_without_www=str_replace('http://','',$url);
	$url_without_www=str_replace('www.','',$url_without_www);
	$url_without_www= str_replace(strstr($url_without_www,'/'),'',$url_without_www);
	$url_without_www=trim($url_without_www);
	$input = @file_get_contents($url) or die('Could not access file: $url');
	$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
	$inbound=0;
	$outbound=0;
	$nonfollow=0;
	if(preg_match_all("/$regexp/siU", $input, $matches, PREG_SET_ORDER)) {
		foreach($matches as $match) {
			# $match[2] = link address
			 # $match[3] = link text
			//echo $match[3].'<br>';
			if(!empty($match[2]) && !empty($match[3])) {
				if(strstr(strtolower($match[2]),'URL:') || strstr(strtolower($match[2]),'url:') ) {
					$nonfollow +=1;
				}
				else if (strstr(strtolower($match[2]),$url_without_www) || !strstr(strtolower($match[2]),'http://')) {
					 $inbound += 1;
					 echo '<br>inbound '. $match[2];
				 }
				else if (!strstr(strtolower($match[2]),$url_without_www) && strstr(strtolower($match[2]),'http://')) {
						echo '<br>outbound '. $match[2];
						$outbound += 1;
					}
			}
		}
	}
	$links['inbound']=$inbound;
	$links['outbound']=$outbound;
	$links['nonfollow']=$nonfollow;
	return $links;
}
 
// ************************Usage********************************
$Domain='http://aabsys.com';
$links=getinboundLinks($Domain);
echo '<br>Number of inbound Links '.$links['inbound'];
echo '<br>Number of outbound Links '.$links['outbound'];
echo '<br>Number of Nonfollow Links '.$links['nonfollow'];
?>