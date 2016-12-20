<?php
header('Content-Type: application/json');
ob_start();

$q = preg_replace("/[^inupw]/i", "", $_GET['q']);

if ($q == 'in') {
?>
<div class="panel-brand brand-blue-sky">Sign In</div>
<form method="post" action="jsON/form-post.php" class="ajax" data-token="{token-code}">
	<input type="text" class="form-control" name="uid" placeholder="E-mail" />
	<input type="password" class="form-control" name="pwd" placeholder="Password" />
	<div class="alert alert-info">
		<a href="utility-pwd.html"><i class="ion ion-fw ion-information"></i> Forgot your password?</a>
	</div>
	<div class="text-right">
		<button type="submit" class="btn btn-default ripple">
			<i class="ion ion-fw ion-chevron-right"></i>
		</button>
	</div>
</form>
<?php
} else if ($q == 'up') {
?>
<div class="panel-brand brand-ocean">Free Sign Up</div>
<form method="post" action="jsON/form-post.php" class="ajax" id="form-id" data-token="{token-code}">
	<div class="list-group">
		<div class="list-group-item">
			<div class="error">
				<label class="text-muted" for="name">Name</label>
				<input type="text" class="form-control keyup" data-href="jsON/uname.php" name="name" id="name" placeholder="Name" />
				<div class="error-text">This field can not be empty.</div>
			</div>
		</div>
		<div class="list-group-item">
			<label class="text-muted" for="uid">E-mail</label>
			<input type="text" class="form-control" name="uid" id="uid" placeholder="E-mail" />
		</div>
		<div class="list-group-item">
			<div class="row">
				<div class="col-xs-6">
					<label class="text-muted" for="pwd">Password</label>
					<input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" />
				</div>
				<div class="col-xs-6">
					<label class="text-muted" for="pwd-re">Re-Password</label>
					<input type="password" class="form-control" name="pwd-re" id="pwd-re" placeholder="Re Password" />
				</div>
			</div>
		</div>
		<div class="list-group-item">
			<div class="captcha"></div>
		</div>
	</div>
	<div class="alert alert-info">
		<i class="ion ion-fw ion-information"></i> Example register form.
	</div>
	<div class="text-right">
		<button type="submit" class="btn btn-default ripple">
			<i class="ion ion-fw ion-chevron-right"></i>
		</button>
	</div>
</form>
<?php
} else if ($q == 'pw') {
?>
<div class="panel-brand brand-sunset-camping">Forgotten Password</div>
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
		<button type="submit" class="btn btn-default ripple">
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
		"class" => "col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-4"
	]
];

echo json_encode($array);