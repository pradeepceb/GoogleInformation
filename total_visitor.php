
<?php
 
require 'gapi-1.3/gapi.class.php';
 
/* Set your Google Analytics credentials */
define('ga_account'     ,'1096366798109-compute@developer.gserviceaccount.com');
define('ga_password'    ,'WebelLabs-5bf0a37351e1.p12');
define('ga_profile_id'  ,'67308703');
 
$ga = new gapi(ga_account,ga_password);
 
/* We are using the 'source' dimension and the 'visits' metrics */
//$dimensions = array('source');
//$metrics    = array('visits');
 $dimensions = array('pagePath');
$metrics = array('uniquePageviews');
$sort = '-uniquePageviews';
/* We will sort the result be desending order of visits, 
    and hence the '-' sign before the 'visits' string */
$ga->requestReportData(ga_profile_id, $dimensions, $metrics,$sort);
//$ga->requestReportData(ga_profile_id, $dimensions, $metrics,'-visits');
 
$gaResults = $ga->getResults();
/* 
$i=1;
 
foreach($gaResults as $result)
{
    printf("%-4d %-40s %5d\n",
           $i++,
           $result->getSource(),
           $result->getVisits());
		   echo "......<br/>";
}
 */
//echo "\n-----------------------------------------\n";
echo $ga->getTotalResults();    
 
?>