<?php
header('Content-Type => application/json');

ob_start();
?>
<div class="container-fluid">
	<div class="alert alert-info closes">
		<i class="ion ion-information ion-fw"></i> Ajax notifications results...
	</div>
	<div class="list-group">
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Ajax</strong> function is completed!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> <a href="#">LINK</a> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
		<div class="list-group-item text-muted">
			<i class="ion ion-fw ion-ios-bell"></i> <strong>Dummy</strong> notification!
		</div>
	</div>
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
			"target" => "#notification-badge",
			"content" => ""
		]
	]
];

echo json_encode($array);