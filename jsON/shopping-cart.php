<?php
header('Content-Type => application/json');

ob_start();
?>
<div class="container-fluid">
asdasd
</div>
<?php
$content = ob_get_clean();

$array = [
	"html" => [
		[
			"type" => "dom",
			"target" => ".dock",
			"content" => $content
		]
	]
];

echo json_encode($array);