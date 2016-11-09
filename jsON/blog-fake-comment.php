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
<div class="media" id="blog-comment-<?php echo $id;?>">
	<div class="media-left">
		<img class="media-object img-circle" src="upload/user-6.jpg" alt="...">
	</div>
	<div class="media-body">
		<div class="row">
			<div class="col-xs-8">
				<p class="pd-5">
					<a href="utility-user.html"><strong>You</strong></a>
					<a href="#" class="ajax" data-href="jsON/delete.php?id=blog-comment-<?php echo $id;?>&status=confirmation"><i class="ion ion-fw ion-trash-a"></i></a>
				</p>
			</div>
			<div class="col-xs-4 text-muted text-right">
				<p class="pd-5">Now</p>
			</div>
			<div class="col-xs-12">
				<p class="pd-5"><?php echo $message;?></p>
			</div>
		</div>
	</div>
</div>
<?php
$content = ob_get_clean();

if (strlen($message) == '') {
	header('Content-Type: application/json', true, 422);

	$array = [
		"comment" => [ "Comment can not be empty!" ]
	];
} else
	$array = [
		"toast" => [
			"text" => "Comment sent...",
			"timeOut" => 4000
		],
		"html" => [
			[
				"type" => "append",
				"target" => ".comments > .media-list",
				"content" => $content
			]
		],
		"dom" => [
			[
				"type" => "reset",
				"target" => "this"
			]
		]
	];

echo json_encode($array);