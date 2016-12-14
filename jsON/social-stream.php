<?php
header('Content-Type: application/json');
ob_start();

$id1 = rand(1, 9999999999999);
$id2 = rand(1, 9999999999999);
$id3 = rand(1, 9999999999999);
$id4 = rand(1, 9999999999999);
?>
<!-- Video Article -->
<article class="panel-body">
	<div class="card">
		<div class="card-body">
			<div class="pdb-10">
				<div class="row">
					<div class="col-xs-9">
						<div class="media">
							<div class="media-left">
								<img class="media-object img-rounded" src="upload/user-3.jpg" alt="..." />
							</div>
							<div class="media-body">
							    <p class="media-heading">
							    	<a href="pages-social-user.html"><strong>John Test</strong></a>
							    </p>
							    <p class="text-muted">16h</p>
							</div>
						</div>
					</div>
					<div class="col-xs-3 text-right">
						<a href="#" data-toggle="dropdown">
							<i class="caret"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#"><i class="ion ion-fw ion-edit"></i> Edit</a>
							</li>
							<li>
								<a href="#"><i class="ion ion-fw ion-trash-a"></i> Delete</a>
							</li>
							<li>
								<a href="#"><i class="ion ion-fw ion-link"></i> External Link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="embed-responsive embed-responsive-16by9 social-video">
				<iframe
					data-src="https://player.vimeo.com/video/181769142?title=0&byline=0&portrait=0&autplay=1"
					data-img="https://i.vimeocdn.com/video/590435247_1280x720.jpg"
					src="about:blank"
					class="embed-responsive-item"
					frameborder="0"
					webkitallowfullscreen
					mozallowfullscreen
					allowfullscreen></iframe>
			</div>
			<div class="pdt-10 pdl-5 read-more click-class" data-target="this" data-add="active">
				<p><strong>The standard Lorem Ipsum passage, used since the 1500s</strong></p>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
				<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
			</div>
		</div>
		<div class="card-middle">
			<a class="btn btn-default ripple ajax" id="like-btn-<?php echo $id1;?>" data-href="jsON/like.php?key=<?php echo $id1;?>" href="#">
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
				<div class="media" id="social-comment-<?php echo $id1;?>">
					<div class="media-left">
						<img class="media-object img-circle" src="upload/user-6.jpg" alt="...">
					</div>
					<div class="media-body">
						<div class="row">
							<div class="col-xs-8">
								<p class="pd-5">
									<a href="pages-social-profile.html"><strong>You</strong></a>
									<a href="#" class="ajax" data-href="jsON/delete.php?id=social-comment-<?php echo $id1;?>&status=confirmation"><i class="ion ion-fw ion-trash-a"></i></a>
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
<!-- Image Article -->
<article class="panel-body">
	<div class="card">
		<div class="card-body">
			<div class="pdb-10">
				<div class="row">
					<div class="col-xs-9">
						<div class="media">
							<div class="media-left">
								<img class="media-object img-rounded" src="upload/user-4.jpg" alt="..." />
							</div>
							<div class="media-body">
							    <p class="media-heading">
							    	<a href="pages-social-user.html"><strong>Jack Muscle</strong></a>
							    </p>
							    <p class="text-muted">16h</p>
							</div>
						</div>
					</div>
					<div class="col-xs-3 text-right">
						<a href="#" data-toggle="dropdown">
							<i class="caret"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#"><i class="ion ion-fw ion-edit"></i> Edit</a>
							</li>
							<li>
								<a href="#"><i class="ion ion-fw ion-trash-a"></i> Delete</a>
							</li>
							<li>
								<a href="#"><i class="ion ion-fw ion-link"></i> External Link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="social-image">
				<img alt="..." src="upload/social-stream-1.jpg" class="img-responsive" />
			</div>
			<div class="pdt-10 pdl-5 read-more click-class" data-target="this" data-add="active">
				<p><strong>The standard Lorem Ipsum passage, used since the 1500s</strong></p>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
				<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
			</div>
		</div>
		<div class="card-middle">
			<a class="btn btn-default ripple ajax" id="like-btn-<?php echo $id2;?>" data-href="jsON/like.php?key=<?php echo $id2;?>" href="#">
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
				<div class="media" id="social-comment-<?php echo $id2;?>">
					<div class="media-left">
						<img class="media-object img-circle" src="upload/user-6.jpg" alt="...">
					</div>
					<div class="media-body">
						<div class="row">
							<div class="col-xs-8">
								<p class="pd-5">
									<a href="pages-social-profile.html"><strong>You</strong></a>
									<a href="#" class="ajax" data-href="jsON/delete.php?id=social-comment-<?php echo $id2;?>&status=confirmation"><i class="ion ion-fw ion-trash-a"></i></a>
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
<!-- Text Article -->
<article class="panel-body">
	<div class="card">
		<div class="card-body">
			<div class="pdb-10">
				<div class="row">
					<div class="col-xs-9">
						<div class="media">
							<div class="media-left">
								<img class="media-object img-rounded" src="upload/user-5.jpg" alt="..." />
							</div>
							<div class="media-body">
							    <p class="media-heading">
							    	<a href="pages-social-user.html"><strong>Megan Flex</strong></a>
							    </p>
							    <p class="text-muted">16h</p>
							</div>
						</div>
					</div>
					<div class="col-xs-3 text-right">
						<a href="#" data-toggle="dropdown">
							<i class="caret"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#"><i class="ion ion-fw ion-edit"></i> Edit</a>
							</li>
							<li>
								<a href="#"><i class="ion ion-fw ion-trash-a"></i> Delete</a>
							</li>
							<li>
								<a href="#"><i class="ion ion-fw ion-link"></i> External Link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="pdt-10 pdl-5 read-more click-class" data-target="this" data-add="active">
				<p><strong>The standard Lorem Ipsum passage, used since the 1500s</strong></p>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
				<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
			</div>
		</div>
		<div class="card-middle">
			<a class="btn btn-default ripple ajax" id="like-btn-<?php echo $id3;?>" data-href="jsON/like.php?key=<?php echo $id3;?>" href="#">
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
				<div class="media" id="social-comment-<?php echo $id3;?>">
					<div class="media-left">
						<img class="media-object img-circle" src="upload/user-6.jpg" alt="...">
					</div>
					<div class="media-body">
						<div class="row">
							<div class="col-xs-8">
								<p class="pd-5">
									<a href="pages-social-profile.html"><strong>You</strong></a>
									<a href="#" class="ajax" data-href="jsON/delete.php?id=social-comment-<?php echo $id3;?>&status=confirmation"><i class="ion ion-fw ion-trash-a"></i></a>
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

<!-- Image Article -->
<article class="panel-body">
	<div class="card">
		<div class="card-body">
			<div class="pdb-10">
				<div class="row">
					<div class="col-xs-9">
						<div class="media">
							<div class="media-left">
								<img class="media-object img-rounded" src="upload/user-4.jpg" alt="..." />
							</div>
							<div class="media-body">
							    <p class="media-heading">
							    	<a href="pages-social-user.html"><strong>Jack Muscle</strong></a>
							    </p>
							    <p class="text-muted">16h</p>
							</div>
						</div>
					</div>
					<div class="col-xs-3 text-right">
						<a href="#" data-toggle="dropdown">
							<i class="caret"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#"><i class="ion ion-fw ion-edit"></i> Edit</a>
							</li>
							<li>
								<a href="#"><i class="ion ion-fw ion-trash-a"></i> Delete</a>
							</li>
							<li>
								<a href="#"><i class="ion ion-fw ion-link"></i> External Link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="social-image">
				<img alt="..." src="upload/social-stream-2.jpg" class="img-responsive" />
			</div>
			<div class="pdt-10 pdl-5 read-more click-class" data-target="this" data-add="active">
				<p><strong>The standard Lorem Ipsum passage, used since the 1500s</strong></p>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
				<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
			</div>
		</div>
		<div class="card-middle">
			<a class="btn btn-default ripple ajax" id="like-btn-<?php echo $id4;?>" data-href="jsON/like.php?key=<?php echo $id4;?>" href="#">
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
				<div class="media" id="social-comment-<?php echo $id4;?>">
					<div class="media-left">
						<img class="media-object img-circle" src="upload/user-6.jpg" alt="...">
					</div>
					<div class="media-body">
						<div class="row">
							<div class="col-xs-8">
								<p class="pd-5">
									<a href="pages-social-profile.html"><strong>You</strong></a>
									<a href="#" class="ajax" data-href="jsON/delete.php?id=social-comment-<?php echo $id4;?>&status=confirmation"><i class="ion ion-fw ion-trash-a"></i></a>
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
		[ "type" => (intval($_POST['page']) == 1)?"dom":"append", "target" => "this", "content" => $content ]
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

if (intval($_POST['page']) == 1)
	$array["scrollTo"] = [
		"element" => "body",
		"tolerance" => "-50px"
	];

echo json_encode($array);