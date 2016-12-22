<?php
header('Content-Type: application/json');

ob_start();
?>
<ul class="row themes">
	<li class="col col-xs-3 theme-1">
		<a href="#" class="click-class" data-target="nav.header,.navbar-redknee,.search" data-add="theme-1" data-remove="theme-1 theme-2 theme-3 theme-4"></a>
	</li>
	<li class="col col-xs-3 theme-2">
		<a href="#" class="click-class" data-target="nav.header,.navbar-redknee,.search" data-add="theme-2" data-remove="theme-1 theme-2 theme-3 theme-4"></a>
	</li>
	<li class="col col-xs-3 theme-3">
		<a href="#" class="click-class" data-target="nav.header,.navbar-redknee,.search" data-add="theme-3" data-remove="theme-1 theme-2 theme-3 theme-4"></a>
	</li>
	<li class="col col-xs-3 theme-4">
		<a href="#" class="click-class" data-target="nav.header,.navbar-redknee,.search" data-add="theme-4" data-remove="theme-1 theme-2 theme-3 theme-4"></a>
	</li>
</ul>

<div class="brand">
	<a href="index.html" class="visible-xs visible-sm">
		<div class="text-icon">red<strong>knee</strong></div>
	</a>
</div>
<div class="panel panel-material">
	<div class="panel-heading">Computer Prices and Models</div>
	<div class="panel-heading panel-heading-sm text-muted">There are 43.224 products</div>
	<div class="panel-body panel-body-unstyled">
		<a href="#"><img alt="..." src="upload/shopping-1.jpg" class="img-responsive" /></a>
	</div>
</div>
<div class="group panel-group" id="drawer-menu">
	<div class="panel panel-unstyled">
		<div class="panel-heading">
			<a data-toggle="collapse" href="#collapseCats">
				<strong><i class="ion ion-ios-arrow-down ion-fw"></i> Subcategories</strong>
			</a>
		</div>
		<div class="panel-collapse collapse in" id="collapseCats">
			<div class="list-group">
				<a class="list-group-item ripple" href="#">Computers <span class="badge">1,124</span></a>
				<a class="list-group-item ripple" href="#">Printers <span class="badge">2,033</span></a>
				<a class="list-group-item ripple" href="#">Data Storage <span class="badge">4,210</span></a>
				<a class="list-group-item ripple" href="#">...</a>
			</div>
		</div>
	</div>
	<div class="panel panel-unstyled">
		<div class="panel-heading">
			<a data-toggle="collapse" href="#collapseBrand">
				<strong><i class="ion ion-ios-arrow-down ion-fw"></i> Brands</strong>
			</a>
		</div>
		<div class="panel-collapse collapse in" id="collapseBrand">
			<div class="list-group">
				<div class="list-group-item">
					<label class="text-muted">
						<input type="checkbox" />
						HP <span class="badge">1,255</span>
					</label>
				</div>
				<div class="list-group-item">
					<label class="text-muted">
						<input type="checkbox" />
						Toshiba <span class="badge">1,255</span>
					</label>
				</div>
				<div class="list-group-item">
					<label class="text-muted">
						<input type="checkbox" />
						Samsung <span class="badge">1,255</span>
					</label>
				</div>
				<div class="list-group-item">
					<label class="text-muted">
						<input type="checkbox" />
						Dell <span class="badge">1,255</span>
					</label>
				</div>
				<div class="list-group-item">
					...
				</div>
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
			"target" => "this",
			"content" => $content
		]
		
	]
];

echo json_encode($array);