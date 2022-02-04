<?php
$url = $_GET['url'];

file_get_contents($url);
return "ok";
/*
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $last);
fclose($myfile);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $last);
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

return "ok";*/
