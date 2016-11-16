<?php
header('Content-Type: application/json');

function get($key) { return preg_replace("/[^a-z0-9\-]/i","",(isset($_GET[$key]))?$_GET[$key]:''); }

ob_start();

if (get('tab') == 1) {
	echo "tab 1";
} else if (get('tab') == 2) {
	echo "tab 2";
} else if (get('tab') == 3) {
	echo "tab 3";
} else if (get('tab') == 4) {
	echo "tab 4";
} else if (get('tab') == 5) {
	echo "tab 5";
}

$content = ob_get_clean();

$array = [
	"html" => [
		[
			"type" => "dom",
			"content" => $content,
			"target" => "this"
		]
	]
];

echo json_encode($array);