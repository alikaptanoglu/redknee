<?php
header('Content-Type: application/json', true, 422);

$array = [
	"name" => [ "This username already exists." ]
];

echo json_encode($array);