<?php
header('Content-Type: application/json', true, 422);

$array = [
	"name" => [ "Example Request Error 1" ],
	"subject" => [ "Example Request Error 2" ]
];

echo json_encode($array);