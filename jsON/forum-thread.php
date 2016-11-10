<?php
header('Content-Type: application/json');
ob_start();
?>
<div class="panel panel-material" id="message-1">
	<div class="panel-heading">
		<i class="ion ion-erlenmeyer-flask ion-fw"></i> Morbi lacus leo, consectetur ac pretium vitae, viverra in nisl. Proin id accumsan nisl.
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-4 col-sm-4 user">
			<div class="float">
				<div class="col image">
					<img alt="..." src="upload/user.jpg" class="img img-circle img-responsive avatar" />
				</div>
				<div class="col information">
					<h3>John Doe</h3>
					<div class="dropdown">
						<a href="#" data-toggle="dropdown">@jdoe <i class="caret"></i></a>
						<ul class="dropdown-menu">
							<li><a href="utility-user.html"><i class="ion ion-fw ion-person"></i> Profile</a></li>
							<li><a href="#" class="ajax" data-href="jsON/dm.php"><i class="ion ion-fw ion-chatbubbles"></i> Direct Message</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="tab-panel hidden-xs">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab-1" data-toggle="tab"><i class="ion ion-fw ion-person"></i></a>
					</li>
					<li>
						<a href="#tab-2" data-toggle="tab"><i class="ion ion-fw ion-information"></i></a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab-1">
			          	<p><strong>Join</strong> 2 month</p>
			            <p><strong>Threads</strong> 44</p>
			            <p><strong>Likes</strong> 445</p>
					</div>
					<div class="tab-pane" id="tab-2">
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
					<div class="quote">
	                	<p><a href="utility-user.html" class="hyper-user red bold">Admin</a>  Sed eleifend consectetur libero, nec ultricies nisi ultrices et. Cras et nisi dui. In convallis arcu in nunc tincidunt euismod. Praesent vel interdum dolor, aliquet pharetra metus. Vivamus venenatis lorem ac leo placerat pharetra. Aenean eu ante iaculis, consectetur nunc et, porta urna. Donec ut sollicitudin turpis. Donec dictum consequat pulvinar. Nunc eget nisl ultrices, efficitur sem nec, rutrum enim. Ut mi neque, placerat ut sagittis ut, lobortis ornare velit. Sed iaculis placerat rutrum. Maecenas non turpis dui. Etiam eget purus lectus.</p>
	                </div>

	                <p>Ut vitae diam ac ligula dignissim tincidunt. Proin euismod ipsum in nibh pulvinar, vulputate accumsan justo ornare. Nullam eu leo eget dui eleifend lacinia id at elit. Proin cursus, sem id pharetra venenatis, enim enim consequat est, quis hendrerit odio tellus in elit. Suspendisse sed elit imperdiet, aliquam lorem quis, scelerisque erat. Sed sit amet lobortis erat. Nulla enim risus, pretium a velit non, lacinia venenatis mi.</p>
	                
	                <a class="edit-class btn btn-default ripple" data-target="#hidden-content-1" data-toggle="hidden" href="#">
	                	<i class="ion ion-fw ion-eye"></i>Spoiler
	                </a>
	                <div class="hidden text-danger" id="hidden-content-1">Morbi lacus leo, consectetur ac pretium vitae, viverra in nisl. Proin id accumsan nisl. Phasellus scelerisque quam vitae tincidunt pulvinar. Duis vel convallis leo, id eleifend neque. Etiam placerat mauris eros, sed porttitor nisi tempus non. Fusce consequat massa quis sem tincidunt, non tempus purus commodo. Integer ac sodales lorem. Morbi vel orci eu tortor dictum dignissim.</div>

	                <div class="embed-responsive embed-responsive-16by9">
	                	<iframe src="https://player.vimeo.com/video/181769142" width="640" height="480" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	                </div>

	                <div class="text-muted">
	                	<em>This topic was updated on 09/08/2016 11:04.</em>
	                </div>

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
								<li><a href="pages-forum-textarea.html"><i class="ion ion-fw ion-reply"></i> Reply</a></li>
								<li><a href="pages-forum-textarea.html"><i class="ion ion-fw ion-edit"></i> Edit</a></li>
								<li><a href="#" class="ajax" data-href="jsON/delete.php?id=message-1&status=confirmation"><i class="ion ion-fw ion-trash-a"></i> Delete</a></li>
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

<div class="panel panel-material" id="message-2">
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
							<li><a href="#" class="ajax" data-href="jsON/dm.php"><i class="ion ion-fw ion-chatbubbles"></i> Direct Message</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="tab-panel hidden-xs">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab-1-1" data-toggle="tab"><i class="ion ion-fw ion-person"></i></a>
					</li>
					<li>
						<a href="#tab-1-2" data-toggle="tab"><i class="ion ion-fw ion-information"></i></a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab-1-1">
			          	<p><strong>Join</strong> 2 month</p>
			            <p><strong>Threads</strong> 44</p>
			            <p><strong>Likes</strong> 445</p>
					</div>
					<div class="tab-pane" id="tab-1-2">
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
	                <p>Ut vitae diam ac ligula dignissim tincidunt. Proin euismod ipsum in nibh pulvinar, vulputate accumsan justo ornare. Nullam eu leo eget dui eleifend lacinia id at elit. Proin cursus, sem id pharetra venenatis, enim enim consequat est, quis hendrerit odio tellus in elit. Suspendisse sed elit imperdiet, aliquam lorem quis, scelerisque erat. Sed sit amet lobortis erat. Nulla enim risus, pretium a velit non, lacinia venenatis mi.</p>

	                <div class="text-muted">
	                	<em>This message was updated on 09/08/2016 11:04.</em>
	                </div>

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
								<li><a href="pages-forum-textarea.html"><i class="ion ion-fw ion-reply"></i> Reply</a></li>
								<li><a href="pages-forum-textarea.html"><i class="ion ion-fw ion-edit"></i> Edit</a></li>
								<li><a href="#" class="ajax" data-href="jsON/delete.php?id=message-2&status=confirmation"><i class="ion ion-fw ion-trash-a"></i> Delete</a></li>
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

<div class="panel panel-material" id="message-3">
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
							<li><a href="#" class="ajax" data-href="jsON/dm.php"><i class="ion ion-fw ion-chatbubbles"></i> Direct Message</a></li>
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
	                <div class="text-warning">
	                	<i class="ion ion-fw ion-information"></i> Hidden content! For registered users only.
	                	Get <a href="#" class="ajax" data-href="jsON/sign.php?q=up"><strong>register</strong></a> now free!
	                </div>
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
								<li><a href="pages-forum-textarea.html"><i class="ion ion-fw ion-reply"></i> Reply</a></li>
								<li><a href="pages-forum-textarea.html"><i class="ion ion-fw ion-edit"></i> Edit</a></li>
								<li><a href="#" class="ajax" data-href="jsON/delete.php?id=message-3&status=confirmation"><i class="ion ion-fw ion-trash-a"></i> Delete</a></li>
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
		[ "type" => "append", "target" => "#forum", "content" => $content ]
	],
	"dom" => [
		[ "type" => "remove", "target" => "#forum > .rolling" ],
		[ "type" => "remove", "target" => "#forum > .panel" ]
	],
	"pagination" => [
		"total_results" => 100,
		"current_page" => intval($_POST['page']),
		"total_page" => 10
	]
];

$array["scrollTo"] = [ "element" => "#forum", "tolerance" => "-64px" ];

echo json_encode($array);