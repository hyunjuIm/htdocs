<?php

$ch = curl_init();
$url = 'http://apis.data.go.kr/B090041/openapi/service/SpcdeInfoService/getHoliDeInfo'; /*URL*/
$queryParams = '?' . urlencode('ServiceKey') . '=eiUQbanel5nr1dG333YsGXR5IzgQ6BCX93%2BMNZleRkewYOWNVQefXBM03ON8LGu%2FQPoA8xjmyrDuIhVYhmksXg%3D%3D'; /*Service Key*/
//$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
//$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
$queryParams .= '&' . urlencode('solYear') . '=' . urlencode('2021'); /**/
//$queryParams .= '&' . urlencode('solMonth') . '=' . urlencode('02'); /**/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

$xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA | LIBXML_NOBLANKS) or die("Error: Cannot create object");
$json = json_encode($xml);
$data = json_decode($json,true);


var_dump($xml);
/*
foreach ($xml->children() as $item) {
//	var_dump($item);
	echo $item->getName() . ": " . $item . "<br>";
}
*/
