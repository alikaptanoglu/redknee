<?php
header('Content-Type: application/json');
ob_start();

if ($_GET['q'] == 'in') {
?>
<form method="post" action="/jsON/form-post.php" class="ajax" id="form-id" data-token="{token-code}">
	<input type="text" class="form-control" name="uid" placeholder="E-mail" />
	<input type="text" class="form-control" name="pwd" placeholder="Password" />
	<div class="alert alert-info">
		<i class="ion ion-fw ion-information"></i> Example login form.
	</div>
	<div class="text-right">
		<a class="ajax btn btn-default btn-colored" data-load="#form-id">
			<i class="ion ion-fw ion-chevron-right"></i>
		</a>
	</div>
</form>
<?php
} else if ($_GET['q'] == 'up') {
?>
<form method="post" action="/jsON/form-post.php" class="ajax" id="form-id" data-token="{token-code}">
	<input type="text" class="form-control" name="name" placeholder="Name" />
	<input type="text" class="form-control" name="uid" placeholder="E-mail" />
	<input type="text" class="form-control" name="pwd" placeholder="Password" />
	<input type="text" class="form-control" name="pwd-re" placeholder="Re Password" />
	<div class="alert alert-info">
		<i class="ion ion-fw ion-information"></i> Example register form.
	</div>
	<div class="text-right">
		<a class="ajax btn btn-default btn-colored" data-load="#form-id">
			<i class="ion ion-fw ion-chevron-right"></i>
		</a>
	</div>
</form>
<?php
} else if ($_GET['q'] == 'pw') {
?>
<form method="post" action="/jsON/form-post.php" class="ajax" id="form-id" data-token="{token-code}">
	<input type="text" class="form-control" name="uid" placeholder="E-mail" />
	<div class="alert alert-warning">
		Captcha code "<strong>43rw2f</strong>".
	</div>
	<input type="text" class="form-control" name="uid" placeholder="Captcha" />
	<div class="alert alert-info">
		<i class="ion ion-fw ion-information"></i> Example forgotten password form.
	</div>
	<div class="text-right">
		<a class="ajax btn btn-default btn-colored" data-load="#form-id">
			<i class="ion ion-fw ion-chevron-right"></i>
		</a>
	</div>
</form>
<?php
}

$content = ob_get_clean();

$array = [
	"modal" => [
		"body" => $content,
		"class" => "col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 col-lg-2 col-lg-offset-5 user"
	]
];

echo json_encode($array);