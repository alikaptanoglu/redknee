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

$message = nl2br(htmlspecialchars($_POST['message']));

$id = rand(1, 9999999999999);

ob_start();
?>
<div class="list-group-item">
	<div class="float text-center text-muted pd-10">26 Sep 2016, Fri</div>
	<div class="float">
		<div class="col pull-right img">
			<img alt="..." src="upload/user-2.jpg" class="img img-responsive" />
		</div>
		<div class="col pull-right message">
			<p><?php echo $message;?></p>
			<p class="text-muted">11:53 @janet <a class="ajax" href="#" data-href="jsON/delete.php?status=undo"><i class="ion ion-trash-a ion-fw"></i></a></p>
		</div>
	</div>
</div>
<?php
$content = ob_get_clean();

if (strlen($message) == '')
	$array = [
		"toast" => [
			"text" => "Message can not be empty!",
			"timeOut" => 4000
		]
	];
else
	$array = [
		"toast" => [
			"text" => "Message sent...",
			"timeOut" => 4000
		],
		"html" => [
			[
				"type" => "append",
				"target" => ".chat",
				"content" => $content
			]
		],
		"dom" => [
			[
				"type" => "reset",
				"target" => "this"
			]
		],
		"run" => [ "setTimeout(function() { $('.chat').scrollTop( parseInt($('.chat').height())*parseInt($('.list-group-limit-lg').height()) ); }, 0)" ]
	];

echo json_encode($array);