<?php

$url = "http://5dd559d3ce4c300014402cb8.mockapi.io/onboard/posts";
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, "$url");
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_handle, CURLOPT_HEADER, false);
$users_data = curl_exec($curl_handle);
curl_close($curl_handle);
$obj = json_decode($users_data, TRUE);
