<?php
header('Content-Type: application/json', true, 422);

$array = [
	"input-1" => [ "Example Request Error 1" ],
	"input-2" => [ "Example Request Error 2" ],
	"input-3" => [ "Example Request Error 3" ],
	"input-4" => [ "Example Request Error 4" ],
	"input-5" => [ "Example Request Error 5" ]
];

echo json_encode($array);