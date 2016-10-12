<?php
header('Content-Type: application/json');

$array = [
	"pagination" =>
	[
		"total_results" => 1064,
		"current_page" => $_POST['page'],
		"total_page" => 107
	]
];

echo json_encode($array);