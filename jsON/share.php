<?php
header('Content-Type: application/json');

ob_start();
?>
<div class="list-group">
	<a href="#" class="list-group-item"><i class="ion ion-fw ion-social-twitter"></i> Share on Twitter</a>
	<a href="#" class="list-group-item"><i class="ion ion-fw ion-social-facebook"></i> Share on Facebook</a>
	<a href="#" class="list-group-item"><i class="ion ion-fw ion-social-whatsapp"></i> Share on Whatsapp</a>
	<a href="#" class="list-group-item"><i class="ion ion-fw ion-social-googleplus"></i> Share on Google Plus</a>
</div>
<div class="text-right pdt-10">
	<a class="edit-class btn btn-danger btn-colored ripple" href="#" data-target="body" data-remove="modal-active">CANCEL</a>
</div>
<?php
$content = ob_get_clean();

$array = [
	"modal" => [
		"body" => $content,
		"class" => "col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 col-lg-2 col-lg-offset-5 share-bg",
		"close" => false
	]
];

echo json_encode($array);