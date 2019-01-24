<?php


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost:3000/bde_site/api/user/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$data = array(
    'first_name' => 'toto',
    'email' => 'toto@email.example',
    'last_name' => 'toto_famille',
    'password' => 'mot2passe',
    'location' => 'pau',
    'status' => 'etudiant'
);

var_dump($data);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

var_dump($output);