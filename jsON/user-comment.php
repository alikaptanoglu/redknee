<?php
header('Content-Type: application/json');

/*
$messages = [
	"Morbi quis odio eu ex consectetura.",
	"Nulla convallis elit eget libero semper posuere.",
	"Nunc vehicula sem quis neque placerat tempus.",
	"Maecenas tincidunt velit eu nunc aliquet luctus."
];

shuffle($messages);
*/

$message = nl2br(htmlspecialchars($_POST['comment']));

$id = rand(1, 9999999999999);

ob_start();
?>
<div class="list-group-item" id="comment-<?php echo $id;?>">
	<p>
		<i class="ion ion-chatbubble ion-fw"></i>
		<a href="#" class="hyper-user root">Admin</a> <a class="text-danger ajax" data-href="jsON/delete.php?id=comment-<?php echo $id;?>&status=confirmation" href="#">&times;</a>
		<span class="text-muted">
			<em>26 Sep 2016, Fri 11:52</em>
		</span>
	</p>
	<p><?php echo $message;?></p>
</div>
<?php
$content = ob_get_clean();

if (strlen($message) == '')
	$array = [
		"toast" => [
			"text" => "Comment can not be empty!",
			"timeOut" => 4000
		]
	];
else
	$array = [
		"toast" => [
			"text" => "Comment sent...",
			"timeOut" => 4000
		],
		"html" => [
			[
				"type" => "append",
				"target" => "#user-comment > .list-group",
				"content" => $content
			]
		],
		"dom" => [
			[
				"type" => "reset",
				"target" => "#user-comment-form"
			]
		],
		"run" => [ "$('textarea').css('height', '')" ]
	];

echo json_encode($array);