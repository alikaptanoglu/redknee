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
	<a href="home2.html" class="list-group-item<?php get('page', 'home2', ' active');?>">
		<i class="ion ion-fw ion-home"></i> HOME 2
	</a>
	<a href="home3.html" class="list-group-item disabled">
		<i class="ion ion-fw ion-home"></i> HOME 3 <span class="badge">Coming Soon</span>
	</a>
	<a href="home4.html" class="list-group-item disabled">
		<i class="ion ion-fw ion-home"></i> HOME 4 <span class="badge">Coming Soon</span>
	</a>
</div>
<div class="group panel-group" id="drawer-menu">
	<div class="panel panel-unstyled">
		<div class="panel-heading">
			<a data-toggle="collapse" data-parent="#drawer-menu" href="#collapsePages">
				<strong><i class="ion ion-ios-arrow-down ion-fw"></i> PAGES</strong>
			</a>
		</div>
		<div class="panel-collapse collapse<?php get('panel', 'pages', ' in');?>" id="collapsePages">
			<div class="list-group">
				<a class="list-group-item disabled" href="pages-adventure-travel.html">Adventure Travel <span class="badge">Coming Soon</span></a>
				<a class="list-group-item<?php get('page', 'forum', ' active');?>" href="pages-forum.html">Forum</a>
				<a class="list-group-item disabled" href="pages-agency.html">Agency <span class="badge">Coming Soon</span></a>
				<a class="list-group-item disabled" href="pages-app-landing.html">App Landing <span class="badge">Coming Soon</span></a>
				<a class="list-group-item<?php get('page', 'resume', ' active');?>" href="pages-resume.html">Resume</a>
				<a class="list-group-item disabled" href="pages-capital-film.html">Capital Film <span class="badge">Coming Soon</span></a>
				<a class="list-group-item disabled" href="pages-fashion.html">Fashion <span class="badge">Coming Soon</span></a>
				<a class="list-group-item disabled" href="pages-fitness.html">Fitness <span class="badge">Coming Soon</span></a>
				<a class="list-group-item disabled" href="pages-restaurant.html">Restaurant <span class="badge">Coming Soon</span></a>
				<a class="list-group-item<?php get('page', 'video', ' active');?>" href="pages-video.html">Video</a>
				<a class="list-group-item disabled" href="pages-winery.html">Winery <span class="badge">Coming Soon</span></a>
				<a class="list-group-item disabled" href="pages-event-seminar.html">Event/Seminar <span class="badge">Coming Soon</span></a>
				<a class="list-group-item disabled" href="pages-architecture.html">Architecture <span class="badge">Coming Soon</span></a>
				<a class="list-group-item disabled" href="pages-photography.html">Photography <span class="badge">Coming Soon</span></a>
				<a class="list-group-item disabled" href="pages-portfolio.html">Portfolio <span class="badge">Coming Soon</span></a>
				<a class="list-group-item disabled" href="pages-shop.html">Shop <span class="badge">Coming Soon</span></a>
				<a class="list-group-item<?php get('page', 'blog', ' active');?>" href="pages-blog.html">Blog</a>
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
				<a class="list-group-item<?php get('page', 'aboutus', ' active');?>" href="utility-about-us.html">About Us</a>
				<a class="list-group-item<?php get('page', 'aboutme', ' active');?>" href="utility-about-me.html">About Me</a>
				<a class="list-group-item<?php get('page', 'services', ' active');?>" href="utility-services.html">Services</a>
				<a class="list-group-item<?php get('page', 'contact', ' active');?>" href="utility-contact.html">Contact</a>
				<a class="list-group-item<?php get('page', 'signin', ' active');?>" href="utility-sign-in.html">Sign In</a>
				<a class="list-group-item<?php get('page', 'signup', ' active');?>" href="utility-sign-up.html">Sign Up</a>
				<a class="list-group-item<?php get('page', 'pwd', ' active');?>" href="utility-pwd.html">Password</a>
				<a class="list-group-item<?php get('page', 'myaccount', ' active');?>" href="utility-my-account.html">My Account</a>
				<a class="list-group-item<?php get('page', 'users', ' active');?>" href="utility-users.html">Users</a>
				<a class="list-group-item<?php get('page', 'user', ' active');?>" href="utility-user.html">User</a>
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
			"target" => "this->find(.rolling)",
			"content" => $content
		]
		
	]
];

echo json_encode($array);