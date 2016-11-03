<?php
header('Content-Type => application/json');

ob_start();
?>
<div class="row">
	<div class="col-sm-8 col-md-9 col-lg-10">
		<div class="panel panel-unstyled">
			<div class="panel-heading">
				<a href="utility-user.html">@janet</a>
			</div>
			<div class="list-group list-group-limit-lg chat">
				<div class="list-group-item">
					<div class="float text-center text-muted pd-10">26 Sep 2016, Fri</div>
					<div class="float">
						<div class="col pull-right img">
							<img alt="..." src="upload/user-2.jpg" class="img img-responsive" />
						</div>
						<div class="col pull-right message">
							<p>Quisque quis nisl nec nibh molestie luctus vitae vel lectus.</p>
							<p>Suspendisse placerat ante id diam maximus, a auctor sem malesuada.</p>
							<p class="text-muted">11:52 @janet <a class="ajax" href="#" data-href="jsON/delete.php?status=undo"><i class="ion ion-trash-a ion-fw"></i></a></p>
							<p>Suspendisse laoreet turpis a elit condimentum rutrum.</p>
							<p class="text-muted">11:53 @janet <a class="ajax" href="#" data-href="jsON/delete.php?status=undo"><i class="ion ion-trash-a ion-fw"></i></a></p>
						</div>
					</div>
				</div>
				<div class="list-group-item">
					<div class="float">
						<div class="col pull-left img">
							<img alt="..." src="upload/user.jpg" class="img img-responsive" />
						</div>
						<div class="col pull-left message">
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, <strong>by injected humour</strong>, or randomised words <i class="ion ion-fw ion-happy-outline text-success"></i> which don't look even slightly believable.</p>
							<p class="text-muted">11:54 @jdoe <a class="ajax" href="#" data-href="jsON/delete.php?status=undo"><i class="ion ion-trash-a ion-fw"></i></a></p>
						</div>
					</div>
				</div>
				<div class="list-group-item">
					<div class="float">
						<div class="col pull-right img">
							<img alt="..." src="upload/user-2.jpg" class="img img-responsive" />
						</div>
						<div class="col pull-right message">
							<p>Cras quis ipsum ac sem hendrerit posuere.</p>
							<p class="text-muted">11:53 @janet <a class="ajax" href="#" data-href="jsON/delete.php?status=undo"><i class="ion ion-trash-a ion-fw"></i></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<form method="post" action="jsON/dm-fake-message.php" class="ajax">
			<input type="text" name="message" placeholder="Your message" class="form-control" />
		</form>
	</div>
	<div class="col-sm-4 col-md-3 col-lg-2">
		<div class="list-group list-group-limit-lg">
			<div class="list-group-item active">
				<p><a href="#">John Doe</a> <span class="text-muted">@jdoe</span></p>
				<p class="text-muted"><strong>10:43</strong> There are many...</p>
			</div>
			<div class="list-group-item">
				<p><a href="#">Jack Doe</a> <span class="text-muted">@jack</span></p>
				<p class="text-muted"><strong>22:04</strong> Contrary to popu...</p>
			</div>
			<div class="list-group-item">
				<p><a href="#">Zuck James</a> <span class="text-muted">@zuck</span></p>
				<p class="text-muted"><strong>00:11</strong> Lorem Ipsum i...</p>
			</div>
			<div class="list-group-item">
				<p><a href="#">David Item</a> <span class="text-muted">@ditem</span></p>
				<p class="text-muted"><strong>12:50</strong> It is a lon...</p>
			</div>
		</div>
	</div>
</div>
<?php
$content = ob_get_clean();

$array = [
	"modal" => [
		"heading" => "Direct Messages",
		"body" => $content,
		"class" => "col-xs-10 col-xs-offset-1",
		"bodyClass" => "gray"
	],
	"run" => [ "setTimeout(function() { $('.chat').scrollTop( parseInt($('.chat').height())*parseInt($('.list-group-limit-lg').height()) ); }, 0)" ]
];

echo json_encode($array);