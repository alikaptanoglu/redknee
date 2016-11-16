<?php
header('Content-Type: application/json');

function get($key) { return preg_replace("/[^a-z0-9\-]/i","",(isset($_GET[$key]))?$_GET[$key]:''); }

$array = [];

ob_start();

switch (get('tab')) {
case 'home':
?>
<div class="row">
	<div class="col-sm-7">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe src="https://player.vimeo.com/video/181769142?title=0&byline=0&portrait=0" class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>
	<div class="col-sm-5">
		<div class="pd-10 read-more edit-class" data-target="this" data-add="active">
			<p><a href="pages-video-video.html"><strong>In ac massa in magna pharetra fermentum ac id dui.</strong></a></p>
			<p class="text-muted">
				<ul class="list-inline">
					<li>1.172 view</li>
					<li>3 weeks ago</li>
				</ul>
			</p>
			<p class="pdt-10">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
		</div>
	</div>
</div>
<?php
	$content = ob_get_clean();

	$array = [
		"html" => [
			[
				"type" => "dom",
				"content" => $content,
				"target" => ".tab-area"
			]
		]
	];
break;
case 'videos':
	ob_start();

	$items = [
		[
			"title" => "Etiam non nisi sed enim bibendum porta.",
			"image" => "upload/funny1.jpg"
		],
		[
			"title" => "Morbi sed felis vulputate, molestie enim quis, pretium turpis.",
			"image" => "upload/funny2.jpg"
		],
		[
			"title" => "Duis tincidunt libero sed odio laoreet, et porta elit vestibulum.",
			"image" => "upload/funny3.jpg"
		],
		[
			"title" => "Proin viverra urna eu scelerisque egestas.",
			"image" => "upload/sports1.jpg"
		],
		[
			"title" => "Praesent id metus ac enim mattis interdum.",
			"image" => "upload/sports2.jpg"
		],
		[
			"title" => "Nam interdum elit vitae massa sagittis pretium.",
			"image" => "upload/sports3.jpg"
		],
		[
			"title" => "Nulla lobortis turpis vestibulum tempus maximus.",
			"image" => "upload/game1.jpg"
		],
		[
			"title" => "Vestibulum sed tellus eu dui ornare hendrerit.",
			"image" => "upload/game2.jpg"
		]
	];

	shuffle($items);

	$i = 0;
?>
<div class="row">
<?php
foreach ($items as $key => $row) {
	if ($i == 4) {
?>
		</div>
		<div class="row">
<?php
		$i = 0;
	}

	$i++;
?>
	<div class="col-sm-6 col-md-3">
		<div class="thumbnail">
			<img src="<?php echo $row['image'];?>" alt="..." />
			<div class="caption">
				<p>
					<a href="pages-video-video.html"><strong><?php echo $row['title'];?></strong></a>
				</p>
				<ul class="list-inline text-muted">
					<li>1.172 view</li>
					<li>3 weeks ago</li>
				</ul>
			</div>
		</div>
	</div>
<?php
}
?>
</div>
<div id="video-pager" class="material-pager pdt-10" data-text="Load More"></div>
<?php
	$content = ob_get_clean();

	$array = [
		"html" => [
			[ "type" => "dom", "target" => ".tab-area", "content" => $content ]
		],
		"pagination" => [
			"total_results" => 100,
			"current_page" => intval($_POST['page']),
			"total_page" => 10
		]
	];
break;
case 'about':
	ob_start();
?>
<div class="row">
	<div class="col-sm-6">
		<div class="pd-10 text-muted">
			<ul>
				<li><strong>24,487</strong> subscribers</li>
				<li><strong>7,308,493</strong> views</li>
				<li>Joined Aug 23, 2013</li>
			</ul>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="pd-10 text-right-not-xs">
			<a class="btn btn-default ripple" href="#">Send Message</a>
			<span class="dropdown">
				<a href="#" class="btn btn-default ripple" data-toggle="dropdown">
					<i class="ion ion-flag"></i> <i class="caret"></i>
				</a>
				<ul class="dropdown-menu pull-right">
					<li><a href="#">Block user</a></li>
				    <li><a href="#">Report channel art</a></li>
				    <li><a href="#">Report channel icon</a></li>
				    <li><a href="#">Report user</a></li>
    			</ul>
			</span>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="pd-10">
			<p><strong>Description</strong></p>
			<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse imperdiet metus ut turpis sollicitudin commodo. Sed pulvinar massa id massa efficitur, a porttitor elit porta. Nullam metus nisi, malesuada feugiat dolor sed, tempor bibendum ligula. Sed aliquam aliquam eros. Integer imperdiet quis dolor et blandit. Duis nibh tellus, auctor ac nunc sit amet, fringilla egestas ante.</p>
		</div>
		<div class="pd-10">
			<p><strong>Links</strong></p>
			<ul>
				<li><a href="#"><i class="ion ion-fw ion-social-facebook"></i> Facebook</li>
				<li><a href="#"><i class="ion ion-fw ion-social-twitter"></i> Twitter</li>
			</ul>
		</div>
	</div>
</div>

<?php
	$content = ob_get_clean();

	$array = [
		"html" => [
			[ "type" => "dom", "target" => ".tab-area", "content" => $content ]
		]
	];
break;
case 'playlists':
	// Playlists kaldı
break;
}

if (get('tab') != 'videos')
	$array["run"] = [ "clear_hash()" ];

$array["editClass"] = [
	[
		"target" => "this->closest(ul)->children(li.active)",
		"remove" => "active"
	],
	[
		"target" => "this->parent(li)",
		"add" => "active"
	]
];

$array["scrollTo"] = [
	"element" => ".tab-area",
	"tolerance" => "-72px"
];

echo json_encode($array);