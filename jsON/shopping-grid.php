<?php
header('Content-Type: application/json');
ob_start();

$items = [
	[
		"title" => "Morbi quis odio eu ex consectetura.",
		"description" => "Nullam cursus purus et lorem semper, vitae blandit ex dapibus.",
		"image" => "upload/example-small.jpg"
	],
	[
		"title" => "Nulla convallis elit eget libero semper posuere.",
		"description" => "Etiam sollicitudin orci faucibus purus ultrices, eu euismod tellus venenatis.",
		"image" => "upload/example-small-2.jpg"
	],
	[
		"title" => "Nunc vehicula sem quis neque placerat tempus.",
		"description" => "Quisque facilisis lorem sit amet ligula faucibus imperdiet non in tortor.",
		"image" => "upload/example-small-3.jpg"
	],
	[
		"title" => "Maecenas tincidunt velit eu nunc aliquet luctus.",
		"description" => "Duis eget diam ultrices, sodales mi condimentum, accumsan lectus.",
		"image" => "upload/example-small-4.jpg"
	]
];

shuffle($items);

foreach ($items as $key => $row) {
?>
asdasdxd
<?php
}

$content = ob_get_clean();

$array = [
	"html" => [
		[ "type" => "append", "target" => "this", "content" => $content ]
	],
	"dom" => [
		[ "type" => "remove", "target" => "this->children(.rolling)" ],
		[ "type" => "remove", "target" => "this->children(.panel-body)" ]
	],
	"pagination" => [
		"total_results" => 100,
		"current_page" => intval($_POST['page']),
		"total_page" => 10
	]
];

if (intval($_POST['page']) != 1)
	$array["scrollTo"] = [
		"element" => "this",
		"tolerance" => "-192px"
	];

echo json_encode($array);