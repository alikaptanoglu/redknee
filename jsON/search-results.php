<?php
header('Content-Type: application/json');
ob_start();
?>
<div class="panel-body">
	<div class="row">
		<div class="col-xs-4 col-sm-2">
			<img alt="..." src="upload/stream-xsmall-8.jpg" class="img img-responsive" />
		</div>
		<div class="col-xs-8 col-sm-7">
			<h3><a href="#">Morbi quis odio eu ex consectetura.</a></h3>
			<p class="text-muted">Nullam cursus purus et lorem semper, vitae blandit ex dapibus.</p>
		</div>
		<div class="hidden-xs col-sm-3 text-muted">26 Sep 2016, Fri 11:52</div>
	</div>
</div>

<div class="panel-body">
	<div class="row">
		<div class="col-xs-4 col-sm-2">
			<img alt="..." src="upload/stream-xsmall-5.jpg" class="img img-responsive" />
		</div>
		<div class="col-xs-8 col-sm-7">
			<h3><a href="#">Nulla convallis elit eget libero semper posuere.</a></h3>
			<p class="text-muted">Etiam sollicitudin orci faucibus purus ultrices, eu euismod tellus venenatis.</p>
		</div>
		<div class="hidden-xs col-sm-3 text-muted">26 Sep 2016, Fri 11:52</div>
	</div>
</div>

<div class="panel-body">
	<div class="row">
		<div class="col-xs-4 col-sm-2">
			<img alt="..." src="upload/stream-xsmall-4.jpg" class="img img-responsive" />
		</div>
		<div class="col-xs-8 col-sm-7">
			<h3><a href="#">Nunc vehicula sem quis neque placerat tempus.</a></h3>
			<p class="text-muted">Quisque facilisis lorem sit amet ligula faucibus imperdiet non in tortor.</p>
		</div>
		<div class="hidden-xs col-sm-3 text-muted">26 Sep 2016, Fri 11:52</div>
	</div>
</div>

<div class="panel-body">
	<div class="row">
		<div class="col-xs-4 col-sm-2">
			<img alt="..." src="upload/stream-xsmall-3.jpg" class="img img-responsive" />
		</div>
		<div class="col-xs-8 col-sm-7">
			<h3><a href="#">Maecenas tincidunt velit eu nunc aliquet luctus.</a></h3>
			<p class="text-muted">Duis eget diam ultrices, sodales mi condimentum, accumsan lectus.</p>
		</div>
		<div class="hidden-xs col-sm-3 text-muted">26 Sep 2016, Fri 11:52</div>
	</div>
</div>
<?php
$content = ob_get_clean();

$array = [
	"modal" => [
		"heading" => "Search Results",
		"body" => $content,
		"class" => 'col-xs-10 col-xs-offset-1'
	]
];

echo json_encode($array);