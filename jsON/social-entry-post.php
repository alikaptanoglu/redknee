<?php
header('Content-Type: application/json');

$array = [
	"html" => [
		[
			"type" => "after",
			"target" => "this",
			"content" => "<div class=\"successfully closes alert alert-success\"><i class=\"ion ion-fw ion-checkmark\"></i> Form submitted successfully!</div>"
		]
	],
	"dom" => [
		[
			"type" => "remove",
			"target" => ".successfully"
		],
		[
			"type" => "reset",
			"target" => "this"
		]
	],
	"editClass" => [
		[
			"target" => ".image-area",
			"add" => "hidden"
		],
		[
			"target" => ".geo-area",
			"add" => "hidden"
		]
	],
];

echo json_encode($array);