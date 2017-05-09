<?php
/*$city = "Mangalore";
 $cityclean = str_replace (" ", "+", $city);
   $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $cityclean . "&sensor=false";

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $details_url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $geoloc = json_decode(curl_exec($ch), true);

   echo "<pre>";
   print_r($geoloc);
   echo "</pre>";*/
   
 /*  $step1 = $geoloc['results'];
   $step2 = $step1['geometry'];
   $coords = $step2['location'];

   print $coords['lat'];
   print $coords['lng'];*/
  
  // 'Authorization: Bearer AIzaSyBTnWbA-HcCVjXzMWdMEH-2r-_eJJUcVCQ',
  // $requestUri = $path;
	//$username = "u_ppvcowfl01";
	//$password = "CAF1#Ryt%M379QC";
	//$credentials = $username.":".$password;
	//$headers  = array("Authorization: Basic AIzaSyBTnWbA-HcCVjXzMWdMEH-2r-_eJJUcVCQ" . base64_encode($credentials) ,'Content-Type:application/xml');
	//ya29.4wGCLUGx7xVN59zJ3uJrgbIDPTL7GJPl1homgwePY8ArwIMNBcZ-wNNxrWVHcS-8D2F5fw
	
	$headers  = array(
						"Authorization: OAuth ya29.6QFwV07McBCjJ6q7Rda5kzV-rP0Lwuukc68RFB1YCsXM9FY0C_kx8LVAMFSfWdTdz3il",
						'Host: www.googleapis.com',
						'X-Target-URI: https://www.googleapis.com',
						'Connection: Keep-Alive'
					);
	//$requestUri = "https://www.googleapis.com/analytics/v3/management/accounts";
	$requestUri = "https://www.googleapis.com/analytics/v3/data/ga?ids=ga:22408114&start-date=2015-08-01&end-date=2015-08-27&metrics=ga:channelGrouping,ga:sessions,ga:newUsers,ga:bounceRate&dimensions=ga:yearWeek";
	$verb = "GET";
	$input = null;
	
	$clientCert = false;
	$verifyPeer = false;
	$verifyHost = false;
	$caPeerCert = false;
	$timeout = 0;
	$httpVersion = "CURL_HTTP_VERSION_NONE";
	
	$ch = curl_init();
       
            
        curl_setopt($ch, CURLOPT_HTTP_VERSION, $httpVersion);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
          
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $verifyHost);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $verifyPeer);
			
			
        curl_setopt($ch,CURLOPT_HEADER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $requestUri);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verb);
		

        $response = curl_exec($ch);

		//echo curl_error($ch);
		
		//print_r(curl_getinfo($ch));
		 
			
	    print_r($response);
    
   