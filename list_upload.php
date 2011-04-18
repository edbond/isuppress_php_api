<?php
// create a new cURL resource
$ch = curl_init();

// phase1
// File uploading
$data = array('_method' => 'PUT',
	      'file' => '@20k.txt');

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, 'http://isuppress.local/api/v1/lists/update');
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "zzz:xxx123");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// post data to URL
$response = curl_exec($ch);
$result = json_decode($response);

var_dump($result);
curl_close($ch);

// phase2
// Check job status
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, 'http://isuppress.local/api/v1/jobs/' . $result->job_id);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "zzz:xxx123");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$result = json_decode($response);

var_dump($result);

// close cURL resource, and free up system resources
curl_close($ch);
?>