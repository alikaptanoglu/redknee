<?php
header('Content-Type => application/json');

ob_start();
?>
	<div class="container-fluid closes">
		<div class="alert alert-info">
			<i class="ion ion-fw ion-information"></i> Dock alert!
		</div>
	</div>
	<div class="list-group">
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Ajax</strong> function is completed!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
		<a href="#" class="list-group-item text-muted" data-toggle="tooltip" title="26 Sep 2016, Fri 11:52" data-placement="left" data-container="body">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</a>
	</div>

<?php
$content = ob_get_clean();

$array = [
	"html" => [
		[
			"type" => "dom",
			"target" => ".dock",
			"content" => $content
		],
		[
			"type" => "dom",
			"target" => "this->children(.badge)",
			"content" => ""
		]
	]
];

echo json_encode($array);