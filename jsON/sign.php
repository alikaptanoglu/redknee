<?php
header('Content-Type: application/json');
ob_start();

$q = preg_replace("/[^inupw]/i", "", $_GET['q']);

if ($q == 'in') {
?>
<form method="post" action="jsON/form-post.php" class="ajax" data-token="{token-code}">
	<input type="text" class="form-control" name="uid" placeholder="E-mail" />
	<input type="password" class="form-control" name="pwd" placeholder="Password" />
	<div class="alert alert-info">
		<a href="utility-pwd.html"><i class="ion ion-fw ion-information"></i> Forgot your password?</a>
	</div>
	<div class="text-right">
		<button type="submit" class="ajax btn btn-default btn-colored ripple">
			<i class="ion ion-fw ion-chevron-right"></i>
		</button>
	</div>
</form>
<?php
} else if ($q == 'up') {
?>
<form method="post" action="jsON/form-post.php" class="ajax" id="form-id" data-token="{token-code}">
	<input type="text" class="form-control" name="name" placeholder="Name" />
	<input type="text" class="form-control" name="uid" placeholder="E-mail" />
	<input type="text" class="form-control" name="pwd" placeholder="Password" />
	<input type="password" class="form-control" name="pwd-re" placeholder="Re Password" />
	<div class="alert alert-info">
		<i class="ion ion-fw ion-information"></i> Example register form.
	</div>
	<div class="text-right">
		<button type="submit" class="ajax btn btn-default btn-colored ripple">
			<i class="ion ion-fw ion-chevron-right"></i>
		</button>
	</div>
</form>
<?php
} else if ($q == 'pw') {
?>
<form method="post" action="jsON/form-post.php" class="ajax" id="form-id" data-token="{token-code}">
	<input type="text" class="form-control" name="uid" placeholder="E-mail" />
	<div class="alert alert-warning">
		Captcha code "<strong>43rw2f</strong>".
	</div>
	<input type="text" class="form-control" name="uid" placeholder="Captcha" />
	<div class="alert alert-info">
		<a href="utility-sign-up.html"><i class="ion ion-fw ion-information"></i> Or sign up</a>
	</div>
	<div class="text-right">
		<button type="submit" class="ajax btn btn-default btn-colored ripple">
			<i class="ion ion-fw ion-chevron-right"></i>
		</button>
	</div>
</form>
<?php
}

$content = ob_get_clean();

$array = [
	"modal" => [
		"body" => $content,
		"class" => "col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-4 user-bg"
	]
];

echo json_encode($array);