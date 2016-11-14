<?php
header('Content-Type: application/json');
ob_start();

$items = [
	[
		"title" => "Etiam non nisi sed enim bibendum porta.",
		"uploader" => "MUSICCHANNEL",
		"image" => "upload/music1.jpg"
	],
	[
		"title" => "Morbi sed felis vulputate, molestie enim quis, pretium turpis.",
		"uploader" => "MUSICCHANNEL",
		"image" => "upload/music2.jpg"
	],
	[
		"title" => "Duis tincidunt libero sed odio laoreet, et porta elit vestibulum.",
		"uploader" => "MUSICCHANNEL",
		"image" => "upload/music3.jpg"
	],
	[
		"title" => "Proin viverra urna eu scelerisque egestas.",
		"uploader" => "MUSICCHANNEL",
		"image" => "upload/music4.jpg"
	],
	[
		"title" => "Praesent id metus ac enim mattis interdum.",
		"uploader" => "MUSICCHANNEL",
		"image" => "upload/music5.jpg"
	],
	[
		"title" => "Nam interdum elit vitae massa sagittis pretium.",
		"uploader" => "MUSICCHANNEL",
		"image" => "upload/music6.jpg"
	],
	[
		"title" => "Nulla lobortis turpis vestibulum tempus maximus.",
		"uploader" => "MUSICCHANNEL",
		"image" => "upload/music7.jpg"
	],
	[
		"title" => "Vestibulum sed tellus eu dui ornare hendrerit.",
		"uploader" => "MUSICCHANNEL",
		"image" => "upload/music8.jpg"
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
		<div class="panel panel-material">
			<div class="panel-body">
				<div class="card card-item">
					<div class="card-heading text-center" style="background-image: url(<?php echo $row['image'];?>)">
						<h3><i class="ion ion-fw ion-play"></i></h3>
					</div>
					<div class="card-body">
						<h5 class="pdb-10">
							<a href="pages-video-video.html"><?php echo $row['title'];?></a>
						</h5>
						<div class="row">
							<div class="col-xs-8"><a href="pages-video-channel.html"><?php echo $row['uploader'];?></a></div>
							<div class="col-xs-4 text-muted text-right"><?php echo number_format(rand(1000, 100000));?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>
</div>
<?php
$content = ob_get_clean();

$array = [
	"html" => [
		[ "type" => "append", "target" => "#popular-videos > .panel-body", "content" => $content ]
	],
	"dom" => [
		[ "type" => "remove", "target" => "#popular-videos > .panel-body > .rolling" ]
	],
	"pagination" => [
		"total_results" => 100,
		"current_page" => intval($_POST['page']),
		"total_page" => 10
	]
];

echo json_encode($array);