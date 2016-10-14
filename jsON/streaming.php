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

foreach ($items as $row) {
?>
<article class="panel-body">
	<div class="card">
		<div class="card-heading css" data-background-image="url(<?php echo $row['image'];?>)">
			<h3><a href="#"><?php echo $row['title'];?></a></h3>
		</div>
		<div class="card-body">
			<p><?php echo $row['description'];?></p>
			<p class="text-muted">26 Sep 2016, Fri 11:52</p>
		</div>
	</div>
</article>
<div class="panel-footer">
	<a href="#"><i class="ion ion-fw ion-heart"></i></a>
	<a href="#"><i class="ion ion-fw ion-android-textsms"></i></a>
	<a href="#"><i class="ion ion-fw ion-android-share-alt"></i></a>
</div>
<?php
}

$content = ob_get_clean();

$array = [
	"html" => [
		[ "type" => "append", "target" => "#streaming", "content" => $content ]
	],
	"dom" => [
		[ "type" => "remove", "target" => "#streaming > .rolling" ],
		[ "type" => "remove", "target" => "#streaming > .panel-body" ],
		[ "type" => "remove", "target" => "#streaming > .panel-footer" ]
	],
	"pagination" => [
		"total_results" => 1064,
		"current_page" => $_POST['page'],
		"total_page" => 107
	]
];

echo json_encode($array);