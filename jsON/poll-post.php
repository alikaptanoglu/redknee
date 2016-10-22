<?php
header('Content-Type: application/json');

$array = [
	"editCss" => [
		[ "target" => "#poll-radio-1 .progress > .progress-bar", "css" => [ [ "width" => "40%" ] ] ],
		[ "target" => "#poll-radio-2 .progress > .progress-bar", "css" => [ [ "width" => "10%" ] ] ],
		[ "target" => "#poll-radio-3 .progress > .progress-bar", "css" => [ [ "width" => "30%" ] ] ],
		[ "target" => "#poll-radio-4 .progress > .progress-bar", "css" => [ [ "width" => "20%" ] ] ]
	],
	"html" => [
		[ "target" => "this", "type" => "after", "content" => "<div class=\"alert alert-info poll-results\"><i class=\"ion ion-fw ion-information\"></i>24 people participated in this poll. </div>" ],
		[ "target" => "#poll-radio-1 .percent", "type" => "dom", "content" => "(40%)" ],
		[ "target" => "#poll-radio-2 .percent", "type" => "dom", "content" => "(10%)" ],
		[ "target" => "#poll-radio-3 .percent", "type" => "dom", "content" => "(30%)" ],
		[ "target" => "#poll-radio-4 .percent", "type" => "dom", "content" => "(20%)" ]
	],
	"dom" => [
		[
			"type" => "remove",
			"target" => ".poll-results"
		]
	]
];

echo json_encode($array);