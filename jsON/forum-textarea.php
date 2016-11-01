<?php
header('Content-Type: application/json');

function get($key) { return preg_replace("/[^a-z0-9\-]/i","",(isset($_GET[$key]))?$_GET[$key]:''); }

ob_start();

$id = rand(10, 100);
?>
<div class="panel panel-material" id="message-<?php echo $id;?>">
	<div class="row">
		<div class="col-lg-3 col-md-4 col-sm-4 user">
			<div class="float">
				<div class="col image">
					<img alt="..." src="upload/user-2.jpg" class="img img-circle img-responsive avatar" />
				</div>
				<div class="col information">
					<h3>Janet Doe</h3>
					<div class="dropdown">
						<a href="#" data-toggle="dropdown">@janetdoe <i class="caret"></i></a>
						<ul class="dropdown-menu">
							<li><a href="utility-user.html"><i class="ion ion-fw ion-person"></i> Profile</a></li>
							<li><a href="utility-user-dm.html"><i class="ion ion-fw ion-chatbubbles"></i> Direct Message</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="tab-panel hidden-xs">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab-2-1" data-toggle="tab"><i class="ion ion-fw ion-person"></i></a>
					</li>
					<li>
						<a href="#tab-2-2" data-toggle="tab"><i class="ion ion-fw ion-information"></i></a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab-2-1">
			          	<p><strong>Join</strong> 2 month</p>
			            <p><strong>Threads</strong> 44</p>
			            <p><strong>Likes</strong> 445</p>
					</div>
					<div class="tab-pane" id="tab-2-2">
			          	<p><strong>Name</strong> John Doe</p>
			            <p><strong>Age</strong> 24</p>
			            <p><strong>Location</strong> Netherland</p>
					</div>
				</div>
			</div>

		</div>
		<div class="col-lg-9 col-md-8 col-sm-8">
			<div class="panel panel-material">
				<div class="panel-body panel-body-padding thread">
	                <p>Fake reply (<?php echo $id;?>)</p>
	                <div class="signature">
	                	Hey there! I'm using <a href="#">redknee</a>...
	                </div>
				</div>
				<div class="panel-footer">
					<ul class="list-group list-inline">
						<li class="list-group-item dropdown">
							<a href="#" data-toggle="dropdown">
								<i class="ion ion-fw ion-android-more-vertical"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="pages-forum-reply.html"><i class="ion ion-fw ion-reply"></i> Reply</a></li>
								<li><a href="pages-forum-textarea.html"><i class="ion ion-fw ion-edit"></i> Edit</a></li>
								<li><a href="#" class="ajax" data-href="jsON/delete.php?id=message-<?php echo $id;?>&status=confirmation"><i class="ion ion-fw ion-trash-a"></i> Delete</a></li>
							</ul>
						</li>
						<li class="list-group-item">
							<a href="#" data-href="jsON/like.php" class="ajax">
								<i class="ion ion-fw ion-heart-broken"></i> Like
							</a>
						</li>
						<li class="list-group-item text-muted">26 Sep 2016, Fri 11:52</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$content = ob_get_clean();

$array = [
	"html" => [
		[ "type" => "append", "target" => "#forum", "content" => $content ],
		[ "type" => "value", "target" => "textarea", "text" => "" ],
		[ "type" => "focus", "target" => "textarea" ]
	]
];

echo json_encode($array);