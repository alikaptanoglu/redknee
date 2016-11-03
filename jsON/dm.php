<?php
header('Content-Type => application/json');

ob_start();
?>
<div class="row">
	<div class="col-sm-8 col-md-9 col-lg-10">

		<div class="panel panel-material">
			<div class="panel-heading">
				<a href="utility-user.html">@jdoe</a>
			</div>
			<div class="list-group list-group-limit-lg" id="pm-message-list">
				<div class="list-group-item">
					
				</div>
			</div>
		</div>
		<input type="text" name="message" placeholder="Your message" class="form-control" />

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
	"load" => [ "target" => "this", "delay" => 2000 ],
	"run" => [ "setTimeout(function() { $('#pm-message-list').scrollTop( parseInt($('#pm-message-list').height())*parseInt($('.list-group-limit-lg').height()) ); }, 0)" ]
];

echo json_encode($array);