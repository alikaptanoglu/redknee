<?php
header('Content-Type => application/json');

ob_start();
?>
<div class="container-fluid">
	<div class="pdt-10 pdb-10">
		<ul class="list-group">
			<li class="list-group-item">
				<div class="float">
					<div class="col col-xs-6">
						<img class="img-responsive img-rounded" src="upload/day-washingmachine.png" alt="..." />
					</div>
					<div class="col col-xs-6">
						<label>Total</label>
						<input type="number" value="1" name="total" class="form-control" />
					</div>
				</div>
				<p>
					<a href="#">Samsung WW8PJ3282KW/AH A+++ 8KG 1200RPM Washing</a>
				</p>
			</li>
		</ul>
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
		]
	]
];

echo json_encode($array);