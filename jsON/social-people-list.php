<?php
header('Content-Type: application/json');
ob_start();

$list = [
	[
		"name" => "John Doe <span class=\"text-muted\">@jdoe</span>",
		"title" => "Integer maximus nisi vel nulla malesuada, vel convallis tortor porta.",
		"image" => "upload/user.jpg"
	],
	[
		"name" => "Janet Jackson <span class=\"text-muted\">@janet</span>",
		"title" => "Pellentesque euismod metus eu justo porta, et vestibulum sem tincidunt.",
		"image" => "upload/user-1.jpg"
	],
	[
		"name" => "Michael Doe <span class=\"text-muted\">@mdoe</span>",
		"title" => "Aliquam eu purus mattis, lobortis sem vulputate, rhoncus ipsum.",
		"image" => "upload/user-2.jpg"
	],
	[
		"name" => "Chu Lee <span class=\"text-muted\">@leechu</span>",
		"title" => "Cras non quam eleifend, tincidunt arcu a, efficitur sapien.",
		"image" => "upload/user-10.jpg"
	],
	[
		"name" => "Victor Who <span class=\"text-muted\">@mrwho</span>",
		"title" => "Aenean vel ipsum sed nisl vestibulum dignissim porta ac orci.",
		"image" => "upload/user-3.jpg"
	],
	[
		"name" => "Anna Maria <span class=\"text-muted\">@piratemaria</span>",
		"title" => "Vivamus finibus eros ut venenatis commodo.",
		"image" => "upload/user-5.jpg"
	],
	[
		"name" => "Dwayne Dorsey <span class=\"text-muted\">@thedorsey</span>",
		"title" => "Aliquam malesuada ex vitae neque venenatis, vel ornare mi placerat.",
		"image" => "upload/user-6.jpg"
	],
	[
		"name" => "Harry Way <span class=\"text-muted\">@way</span>",
		"title" => "Vestibulum dapibus massa at libero pharetra, nec consequat nibh scelerisque.",
		"image" => "upload/user-7.jpg"
	],
	[
		"name" => "Gabriel V. <span class=\"text-muted\">@gabriel</span>",
		"title" => "Morbi vel justo condimentum, commodo urna at, consequat felis.",
		"image" => "upload/user-8.jpg"
	],
	[
		"name" => "Michael J. <span class=\"text-muted\">@mj</span>",
		"title" => "Fusce quis tortor in enim luctus facilisis.",
		"image" => "upload/user-9.jpg"
	]
];

shuffle($list);

foreach ($list as $row) {
?>
	<li class="media">
		<div class="media-left">
			<img class="media-object img-rounded" src="<?php echo $row['image'];?>" alt="..." />
		</div>
		<div class="media-body">
		    <h4 class="media-heading">
		    	<a href="pages-social-user.html"><?php echo $row['name'];?></a>
		    </h4>
		    <p class="text-muted">
		    	<i class="ion ion-fw ion-location"></i> SD/New York
		    </p>
		    <p class="text-muted">
		    	<i class="ion ion-fw ion-university"></i> Harward University
		    </p>
		</div>
		<div class="media-right">
			<a href="#" class="btn btn-default btn-sm btn-mr btn-bordered ripple active">
				<i class="ion ion-fw ion-person-add"></i>
				<span class="hidden-xs">Follow</span>
			</a>
		</div>
	</li>
<?php
}

$content = ob_get_clean();

$page = (isset($_POST['page'])?$_POST['page']:1);

$next_page = intval($page)+1;

if (intval($page) == 1)
	$array["modal"] = [
		"heading" => "Peoples",
		"body" => "<ul class=\"media-list\"></ul>".
				  "<div class=\"text-center load-more pdt-10\">".
				  "	<a".
				  "		href=\"#\"".
				  "		class=\"btn btn-block btn-mr btn-default ripple ajax\"".
				  "		data-href=\"jsON/social-people-list.php\"".
				  "		data-page=\"2\"".
				  "		data-method=\"post\">Load More</a>".
				  "</div>",
		"class" => "col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 col-xs-10 col-xs-offset-1"
	];

$array["html"] = [
		[
			"type" => "append",
			"target" => ".modal->children(.panel)->children(.panel-body)->children(.media-list)",
			"content" => $content,
			"delay" => 100
		],
		[
			"type" => "dom",
			"target" => ".modal->children(.panel)->children(.panel-body)->children(.load-more)",
			"content" => "<a".
				  		 "	href=\"#\"".
				  		 "	class=\"btn btn-block btn-mr btn-default ripple ajax\"".
				  		 "	data-href=\"jsON/social-people-list.php\"".
				  		 "	data-page=\"".$next_page."\"".
				  		 "	data-method=\"post\">Load More</a>"
		]
	];

echo json_encode($array);