<?php
header('Content-Type: application/json');
ob_start();

function get($key, $val, $class) { echo (preg_replace("/[^a-z0-9]/i","",(isset($_GET[$key]))?$_GET[$key]:'')==$val)?$class:''; }
?>
<div class="brand">
	<a href="index.html">
		<div class="text-icon">red<strong>knee</strong></div>
	</a>
</div>
<div class="group list-group">
	<a href="index.html" class="list-group-item<?php get('page', 'home', ' active');?>">
		<i class="ion ion-fw ion-home"></i> HOME
	</a>
	<a href="home2.html" class="list-group-item disabled">
		<i class="ion ion-fw ion-home"></i> HOME 2 <span class="badge">Coming Soon</span>
	</a>
	<a href="home3.html" class="list-group-item disabled">
		<i class="ion ion-fw ion-home"></i> HOME 3 <span class="badge">Coming Soon</span>
	</a>
</div>
<div class="group panel-group" id="drawer-menu">
	<div class="panel panel-unstyled">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#drawer-menu" href="#collapsePages">
				<strong><i class="ion ion-ios-arrow-down ion-fw"></i> PAGES</strong>
			</a>
		</div>
		<div class="panel-collapse collapse<?php get('panel', 'pages', ' active');?>" id="collapsePages">
			<div class="list-group">
				<a class="list-group-item" href="adventure-travel.html">Adventure Travel</a>
				<a class="list-group-item" href="forum.html">Forum</a>
				<a class="list-group-item" href="agency.html">Agency</a>
				<a class="list-group-item" href="app-landing.html">App Landing</a>
				<a class="list-group-item" href="resume.html">Resume</a>
				<a class="list-group-item" href="capital-film.html">Capital Film</a>
				<a class="list-group-item" href="fashion.html">Fashion</a>
				<a class="list-group-item" href="fitness.html">Fitness</a>
				<a class="list-group-item" href="restaurant.html">Restaurant</a>
				<a class="list-group-item" href="video.html">Video</a>
				<a class="list-group-item" href="winery.html">Winery</a>
				<a class="list-group-item" href="event-seminar.html">Event/Seminar</a>
				<a class="list-group-item" href="architecture.html">Architecture</a>
				<a class="list-group-item" href="photography.html">Photography</a>
				<a class="list-group-item" href="portfolio.html">Portfolio</a>
				<a class="list-group-item" href="shop.html">Shop</a>
				<a class="list-group-item" href="blog.html">Blog</a>
			</div>
		</div>
	</div>
	<div class="panel panel-unstyled">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#drawer-menu" href="#collapseUtility">
				<strong><i class="ion ion-ios-arrow-down ion-fw"></i> UTILITY</strong>
			</a>
		</div>
		<div class="panel-collapse collapse<?php get('panel', 'utility', ' in');?>" id="collapseUtility">
			<div class="list-group">
				<a class="list-group-item" href="utility-about-us.html">About Us</a>
				<a class="list-group-item" href="utility-about-me.html">About Me</a>
				<a class="list-group-item<?php get('page', 'services', ' active');?>" href="utility-services.html">Services</a>
				<a class="list-group-item<?php get('page', 'contact', ' active');?>" href="utility-contact.html">Contact</a>
				<a class="list-group-item<?php get('page', 'signin', ' active');?>" href="utility-sign-in.html">Sign In</a>
				<a class="list-group-item<?php get('page', 'signup', ' active');?>" href="utility-sign-up.html">Sign Up</a>
				<a class="list-group-item<?php get('page', 'pwd', ' active');?>" href="utility-pwd.html">Password</a>
				<a class="list-group-item<?php get('page', 'myaccount', ' active');?>" href="utility-my-account.html">My Account</a>
				<a class="list-group-item<?php get('page', 'faq', ' active');?>" href="utility-faq.html">F.A.Q.</a>
			</div>
		</div>
	</div>

	<div class="panel panel-unstyled">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#drawer-menu" href="#collapseMiscelaneous">
				<strong><i class="ion ion-ios-arrow-down ion-fw"></i> MISCELANEOUS</strong>
			</a>
		</div>
		<div class="panel-collapse collapse<?php get('panel', 'miscelaneous', ' in');?>" id="collapseMiscelaneous">
			<div class="list-group">
				<a class="list-group-item<?php get('page', 'maintenance', ' active');?>" href="miscelaneous-maintenance.html">Maintenance</a>
				<a class="list-group-item<?php get('page', 'countdown', ' active');?>" href="miscelaneous-countdown.html">Countdown</a>
				<a class="list-group-item<?php get('page', '404', ' active');?>" href="miscelaneous-404-not-found.html">404 Not Found</a>
				<a class="list-group-item<?php get('page', '500', ' active');?>" href="miscelaneous-500-internal.html">500 Internal Error</a>
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