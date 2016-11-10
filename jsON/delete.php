<?php
header('Content-Type: application/json');
ob_start();

function get($key) { return preg_replace("/[^a-z0-9\-]/i","",(isset($_GET[$key]))?$_GET[$key]:''); }

if (get('status') == 'confirmation') {
	ob_start();
	?>
	<p>Delete this item?</p>
	<div class="text-right">
		<a href="#" data-target="body" data-remove="modal-active" class="btn btn-default ripple edit-class">CANCEL</a>
		<a href="#" data-href="jsON/delete.php?id=<?php echo get('id')?>&status=ok" class="btn btn-default ripple ajax">DELETE</a>
	</div>
	<?php
	$content = ob_get_clean();
	$array = [
		"modal" => [
			"body" => $content,
			"close" => false,
			"class" => "col-lg-2 col-lg-offset-5 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1"
		]
	];
} else if (get('status') == 'undo') {
	$array = [
		"html" => [
			[
				"content" => "<span class=\"text-danger\">Undo</span>",
				"type" => "dom",
				"target" => "this"
			]
		]
	];
} else {
	if (get('id') == 'message-1')
		$array = [
			'go' => [
				'url' => 'pages-forum-forum.html',
				'delay' => 2000
			],
			'editClass' => [
				[
					'target' => 'body',
					'remove' => 'modal-active'
				]
			],
			'toast' => [
				'text' => 'This thread is deleted!'
			],
			'html' => [
				[
					'type' => 'dom',
					'target' => '.forum',
					'content' => '<div class="alert alert-success"><i class="ion ion-fw ion-checkmark"></i> This thread is deleted!</div>'
				]
			]
		];
	else {
		$array = [
			'dom' => [
				[
					'type' => 'remove',
					'target' => '#'.get('id')
				]
			],
			'editClass' => [
				[
					'target' => 'body',
					'remove' => 'modal-active'
				]
			],
			'toast' => [
				'text' => 'This item is deleted!'
			]
		];
	}
}

echo json_encode($array);