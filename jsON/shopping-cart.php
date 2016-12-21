<?php
header('Content-Type => application/json');

ob_start();
?>
<div class="container-fluid">
	<div class="pdt-10 pdb-10">
		<ul class="list-group">
			<li class="list-group-item">
				<div class="row">
					<div class="col-xs-6">
						<img class="img-responsive img-rounded" src="upload/day-washingmachine.png" alt="..." />
					</div>
					<div class="col-xs-6">
						<label>Quantity</label>
						<input type="number" value="1" name="total" class="form-control" />
					</div>
					<div class="col-xs-12">
						<div class="pdt-5">
							<a href="#">Samsung WW8PJ3282KW/AH A+++ 8KG 1200RPM Washing</a>
						</div>
					</div>
					<div class="col-xs-12 text-muted">
						<p class="pdt-5">%10 discount!</p>
						<p class="pdt-5"><strong>$490,90</strong> + Shipping Cost</p>
					</div>
					<div class="col-xs-12">
						<div class="pdt-5">
							<a class="btn btn-danger btn-block ripple" href="#">
								<i class="ion ion-trash-a ion-fw"></i> Remove
							</a>
						</div>
					</div>
				</div>
			</li>
			<li class="list-group-item">
				<div class="row">
					<div class="col-xs-6">
						<img class="img-responsive img-rounded" src="upload/day-iphone.png" alt="..." />
					</div>
					<div class="col-xs-6">
						<label>Quantity</label>
						<input type="number" value="1" name="total" class="form-control" />
					</div>
					<div class="col-xs-12">
						<div class="pdt-5">
							<a href="#">Apple iPhone 7 32 GB</a>
						</div>
					</div>
					<div class="col-xs-12 text-muted">
						<p class="pdt-5">%10 discount!</p>
						<p class="pdt-5"><strong>$490,90</strong> + Shipping Cost</p>
					</div>
					<div class="col-xs-12">
						<div class="pdt-5">
							<a class="btn btn-danger btn-block ripple" href="#">
								<i class="ion ion-trash-a ion-fw"></i> Remove
							</a>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="panel panel-soft text-right">
			<div class="panel-body">
				<p class="text-muted">Products Total</p>
				<p class="text-muted">(Including Tax)</p>
				<h3 class="pd-5">$ 740,00</h3>
				<p class="text-muted">Shipping Cost</p>
				<h3 class="pd-5 pdb-10">$ 2,00</h3>
				<a href="#" class="btn btn-default btn-block ripple" href="#">Use Promotion Code</a>
				<a href="#" class="btn btn-danger btn-bordered btn-block ripple" href="#">Complete Shopping</a>
			</div>
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
		]
	]
];

echo json_encode($array);