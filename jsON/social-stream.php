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
?>
<article class="panel-body">
	<div class="card">
		<div class="card-body">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="https://player.vimeo.com/video/181769142?title=0&byline=0&portrait=0" class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
			<p class="text-muted">26 Sep 2016, Fri 11:52</p>
			<p>Nullam cursus purus et lorem semper, vitae blandit ex dapibus.</p>
		</div>
		<div class="card-middle">
			<a class="btn btn-default ripple ajax" id="like-btn-1b" data-href="jsON/like.php?key=1b" href="#">
				<i class="ion ion-fw ion-heart-broken"></i> <span>14</span>
			</a>
			<a class="btn btn-default ripple" href="#">
				<i class="ion ion-fw ion-android-share"></i>
			</a>
			<a class="btn btn-default ripple click-class" data-target="this->closest(.card)->children(.comments)" data-remove="hidden" href="#">
				<i class="ion ion-fw ion-chatbubbles"></i> <span>99+</span>
			</a>
		</div>
		<div class="card-body comments hidden">
			<div class="m-center">
				<a class="btn btn-default ripple" href="#">Older Comments (+5)</a>
			</div>
			<div class="media-list">
				<div class="media" id="social-comment-1b">
					<div class="media-left">
						<img class="media-object img-circle" src="upload/user-6.jpg" alt="...">
					</div>
					<div class="media-body">
						<div class="row">
							<div class="col-xs-8">
								<p class="pd-5">
									<a href="pages-social-profile.html"><strong>You</strong></a>
									<a href="#" class="ajax" data-href="jsON/delete.php?id=social-comment-1b&status=confirmation"><i class="ion ion-fw ion-trash-a"></i></a>
								</p>
							</div>
							<div class="col-xs-4 text-muted text-right">
								<p class="pd-5">Now</p>
							</div>
							<div class="col-xs-12">
								<p class="pd-5">Nullam cursus purus et lorem semper, vitae blandit ex dapibus.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form class="pdt-20 ajax" method="post" action="jsON/social-fake-comment.php">
				<input name="comment" type="text" class="form-control" placeholder="Add a comment" />
			</form>
		</div>
	</div>
</article>

<article class="panel-body">
	<div class="card">
		<div class="card-body">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="https://player.vimeo.com/video/181769142?title=0&byline=0&portrait=0" class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
			<p class="text-muted">26 Sep 2016, Fri 11:52</p>
			<p>Nullam cursus purus et lorem semper, vitae blandit ex dapibus.</p>
		</div>
		<div class="card-middle">
			<a class="btn btn-default ripple ajax" id="like-btn-1b" data-href="jsON/like.php?key=1b" href="#">
				<i class="ion ion-fw ion-heart-broken"></i> <span>14</span>
			</a>
			<a class="btn btn-default ripple" href="#">
				<i class="ion ion-fw ion-android-share"></i>
			</a>
			<a class="btn btn-default ripple click-class" data-target="this->closest(.card)->children(.comments)" data-remove="hidden" href="#">
				<i class="ion ion-fw ion-chatbubbles"></i> <span>99+</span>
			</a>
		</div>
		<div class="card-body comments hidden">
			<div class="m-center">
				<a class="btn btn-default ripple" href="#">Older Comments (+5)</a>
			</div>
			<div class="media-list">
				<div class="media" id="social-comment-1b">
					<div class="media-left">
						<img class="media-object img-circle" src="upload/user-6.jpg" alt="...">
					</div>
					<div class="media-body">
						<div class="row">
							<div class="col-xs-8">
								<p class="pd-5">
									<a href="pages-social-profile.html"><strong>You</strong></a>
									<a href="#" class="ajax" data-href="jsON/delete.php?id=social-comment-1b&status=confirmation"><i class="ion ion-fw ion-trash-a"></i></a>
								</p>
							</div>
							<div class="col-xs-4 text-muted text-right">
								<p class="pd-5">Now</p>
							</div>
							<div class="col-xs-12">
								<p class="pd-5">Nullam cursus purus et lorem semper, vitae blandit ex dapibus.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form class="pdt-20 ajax" method="post" action="jsON/social-fake-comment.php">
				<input name="comment" type="text" class="form-control" placeholder="Add a comment" />
			</form>
		</div>
	</div>
</article>
<?php
$content = ob_get_clean();

$array = [
	"html" => [
		[ "type" => "append", "target" => "this", "content" => $content ]
	],
	"dom" => [
		[ "type" => "remove", "target" => "this->children(.rolling)" ]
	],
	"pagination" => [
		"total_results" => 100,
		"current_page" => intval($_POST['page']),
		"total_page" => 10
	]
];

echo json_encode($array);