<?php
header('Content-Type: application/json');

$array = [
	"editCss" => [
		[ "target" => ".poll #option-row-1 .progress > .progress-bar", "css" => [ [ "width" => "40%" ] ] ],
		[ "target" => ".poll #option-row-2 .progress > .progress-bar", "css" => [ [ "width" => "10%" ] ] ],
		[ "target" => ".poll #option-row-3 .progress > .progress-bar", "css" => [ [ "width" => "30%" ] ] ],
		[ "target" => ".poll #option-row-4 .progress > .progress-bar", "css" => [ [ "width" => "20%" ] ] ]
	],
	"html" => [
		[ "target" => ".poll .poll-results", "type" => "dom", "content" => "<div class=\"alert alert-info\"><i class=\"ion ion-fw ion-information\"></i>24 people participated in this poll. </div>" ],
		[ "target" => ".poll #option-row-1 .percent", "type" => "dom", "content" => "(40%)" ],
		[ "target" => ".poll #option-row-2 .percent", "type" => "dom", "content" => "(10%)" ],
		[ "target" => ".poll #option-row-3 .percent", "type" => "dom", "content" => "(30%)" ],
		[ "target" => ".poll #option-row-4 .percent", "type" => "dom", "content" => "(20%)" ]
	]
];

echo json_encode($array);