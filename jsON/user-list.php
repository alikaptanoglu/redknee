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
			<img class="media-object img-circle avatar" src="<?php echo $row['image'];?>" alt="..." />
		</div>
		<div class="media-body">
		    <h4 class="media-heading">
		    	<a href="utility-user.html"><?php echo $row['name'];?></a>
		    </h4>
		    <p class="text-muted"><?php echo $row['title'];?></p>
		</div>
	</li>
<?php
}

$content = ob_get_clean();

$array = [
	"html" => [
		[ "type" => "dom", "target" => "this->children(.media-list)", "content" => $content ]
	],
	"pagination" => [
		"total_results" => 50,
		"current_page" => intval($_POST['page']),
		"total_page" => 5
	]
];

$array["scrollTo"] = [
	"element" => "this->closest(.panel)",
	"tolerance" => "-64px"
];

echo json_encode($array);