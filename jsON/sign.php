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
	<div class="text-right">
		<a href="utility-pwd.html" class="btn btn-default btn-mr ripple">
			Forgotten Password
		</a>
		<button type="submit" class="btn btn-default btn-mr ripple">
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
			<div class="captcha" data-id="modal-captcha"></div>
		</div>
	</div>
	<div class="text-right">
		<button type="submit" class="btn btn-default btn-mr ripple">
			Sign Up <i class="ion ion-fw ion-chevron-right"></i>
		</button>
	</div>
</form>
<?php
} else if ($q == 'pw') {
?>
<div class="panel-brand brand-sunset-camping">Forgotten Password</div>
<form method="post" action="jsON/form-post.php" class="ajax" id="form-id" data-token="{token-code}">
	<input type="text" class="form-control" name="uid" placeholder="E-mail" />
	<div class="captcha" data-id="modal-captcha"></div>
	<div class="text-right">
		<a href="utility-sign-up.html" class="btn btn-default btn-mr ripple">
			Sign Up
		</a>
		<button type="submit" class="btn btn-default btn-mr ripple">
			Send <i class="ion ion-fw ion-chevron-right"></i>
		</button>
	</div>
</form>
<?php
}

$content = ob_get_clean();

$array = [
	"modal" => [
		"body" => $content,
		"class" => "col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"
	]
];

echo json_encode($array);