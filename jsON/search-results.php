<?php
header('Content-Type: application/json');
ob_start();
?>
<div class="container-fluid search-results">
	<div class="panel panel-material">
		<div class="panel-heading">Search Results</div>
		<div class="list-group">
			<a class="list-group-item" href="forum-topic.html">
				<div class="row">
					<div class="col-sm-8">
						<p>
							<strong>
								<i class="ion ion-fw ion-search"></i>
								Quisque eu turpis eget ex gravida pulvinar.
							</strong>
						</p>
						<p class="text-muted">Started by Admin</p>
					</div>
					<div class="col-sm-4 text-muted">26 Sep 2016, Fri 11:52</div>
				</div>
			</a>
			<a class="list-group-item" href="forum-topic.html">
				<div class="row">
					<div class="col-sm-8">
						<p>
							<strong>
								<i class="ion ion-fw ion-search"></i>
								Quisque facilisis mauris quis metus volutpat feugiat.
							</strong>
						</p>
						<p class="text-muted">Started by Admin</p>
					</div>
					<div class="col-sm-4 text-muted">26 Sep 2016, Fri 11:52</div>
				</div>
			</a>
			<a class="list-group-item" href="forum-topic.html">
				<div class="row">
					<div class="col-sm-8">
						<p>
							<strong>
								<i class="ion ion-fw ion-search"></i>
								In pretium arcu at mollis ornare.
							</strong>
						</p>
						<p class="text-muted">Started by Admin</p>
					</div>
					<div class="col-sm-4 text-muted">26 Sep 2016, Fri 11:52</div>
				</div>
			</a>
			<a class="list-group-item" href="forum-topic.html">
				<div class="row">
					<div class="col-sm-8">
						<p>
							<strong>
								<i class="ion ion-fw ion-search"></i>
								Fusce porta nulla at metus iaculis, non scelerisque lectus placerat.
							</strong>
						</p>
						<p class="text-muted">Started by Admin</p>
					</div>
					<div class="col-sm-4 text-muted">26 Sep 2016, Fri 11:52</div>
				</div>
			</a>
			<a class="list-group-item" href="forum-topic.html">
				<div class="row">
					<div class="col-sm-8">
						<p>
							<strong>
								<i class="ion ion-fw ion-search"></i>
								Sed facilisis mi sit amet orci convallis, eget varius sem congue.
							</strong>
						</p>
						<p class="text-muted">Started by Admin</p>
					</div>
					<div class="col-sm-4 text-muted">26 Sep 2016, Fri 11:52</div>
				</div>
			</a>
		</div>
		<div class="text-right">
			<a class="btn btn-danger btn-colored edit-class" data-target=".search-results" data-add="hidden" href="#">
				<i class="ion ion-fw ion-ios-arrow-up"></i>
			</a>
		</div>
	</div>
</div>
<?php
$content = ob_get_clean();

$array = [
	"html" => [
		[
			"type" => "after",
			"content" => $content,
			"target" => ".search"
		]
	],
	"dom" => [
		[
			"type" => "remove",
			"target" => ".search-results"
		]
	]
];

echo json_encode($array);