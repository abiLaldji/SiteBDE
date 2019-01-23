<?php

$response = file_get_contents('http://localhost:3000/bde_site/api/User/1');


$response = json_decode($response);

var_dump($response);