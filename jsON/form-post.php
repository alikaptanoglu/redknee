<?php
header('Content-Type: application/json');

$array = [
	"modal" => [
		"body" => "<h3><i class=\"ion ion-fw ion-android-checkmark-circle\"></i> Form submitted!</h3>",
		"class" => "col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 col-lg-2 col-lg-offset-5 text-success text-center",
		"close" => false,
		"closeDelay" => 2000
	]
];

echo json_encode($array);