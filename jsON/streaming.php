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
<article class="panel-body">
	<div class="card">
		<div class="card-heading" style="background-image: url(<?php echo $row['image'];?>)">
			<h3><a href="pages-blog-read.html"><?php echo $row['title'];?></a></h3>
		</div>
		<div class="card-body">
			<p class="text-muted">26 Sep 2016, Fri 11:52</p>
			<p><?php echo $row['description'];?></p>
		</div>
		<div class="card-footer">
			<a class="btn btn-default ripple btn-colored ajax" id="like-btn-<?php echo $key?>" data-href="jsON/like.php?key=<?php echo $key;?>" href="#">
				<i class="ion ion-fw ion-heart-broken"></i> <span>14</span>
			</a>
			<a class="btn btn-default ripple btn-colored ajax" data-href="jsON/share.php" href="#">
				<i class="ion ion-fw ion-android-share-alt"></i>
			</a>
			<a class="btn btn-default ripple btn-colored" href="pages-blog-read.html">
				<i class="ion ion-fw ion-chatbubble"></i> <span>40</span>
			</a>
		</div>
	</div>
</article>
<?php
}

$content = ob_get_clean();

$array = [
	"html" => [
		[ "type" => "append", "target" => "#streaming", "content" => $content ]
	],
	"dom" => [
		[ "type" => "remove", "target" => "#streaming > .rolling" ],
		[ "type" => "remove", "target" => "#streaming > .panel-body" ]
	],
	"pagination" => [
		"total_results" => 100,
		"current_page" => intval($_POST['page']),
		"total_page" => 10
	]
];

if (intval($_POST['page']) != 1)
	$array["scrollTo"] = [
		"element" => "#streaming",
		"tolerance" => "-64px"
	];

echo json_encode($array);