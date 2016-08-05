<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<title><?php wp_title('&raquo;','true','right'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<link rel="icon" sizes="192x192" href="<?php echo get_stylesheet_directory_uri() ?>/images/touch-icon-192x192.png">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-precomposed.png">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon.ico" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="all" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Cinzel:700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700" rel="stylesheet">
<!--[if lt IE 9]><script src="<?php echo get_stylesheet_directory_uri(); ?>/js/ie-html5shiv-v3.js"></script><![endif]-->
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php
// Just to demonstrate issue detection. - KWH - 20160804
echo 'Current Issue: ' . zbt_get_issue()->name;
?>
<a name="top"></a>
	<header class="site-header" role="banner">
		<section class="top-head zbluebg">
			<div class="row">
				<div class="twelve columns">
					<ul class="sites-nav inbl">
						<li>Zeta Beta Tau |</li>
						<li><a href="http://zbt.org" target="_blank">zbt.org</a></li>
					</ul>
					<div id="nav-mobile-togg">Menu <i class="fa fa-fw fa-bars"></i></div>
					<nav class="main-nav" role="navigation">
						<?php // wp_nav_menu( array('container' => 'false', 'theme_location' => 'global_menu' )); ?>
						<ul class="inbl">
							<li class="searchdrop clickit"><a href="#">Search <i class="fa fa-chevron-down" aria-hidden="true"></i></a></li>
							<li class="clickit"><a href="#" class="">In This Issue <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
								<div class="mega-drop zbluebg">
									<!-- this needs to be replaced with a query of the issue you are currently viewing -->
									<ul class="block-grid four-up">
										<li>
											<h3>Features</h3>
											<Ul>
												<li><a href="#">The post title of the article this one is really long and wraps</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
											</ul>
										</li>
										<li>
											<h3>Alumni &amp; Chapter News</h3>
											<Ul>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
											</ul>
										</li>
										<li>
											<h3>Foundation</h3>
											<Ul>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
											</ul>
										</li>
										<li>
											<h3>Legacies</h3>
											<Ul>
												<li><a href="#">The post title of the article</a></li>
											</ul>
										</li>
										<li>
											<h3>Chapter Eternal</h3>
											<Ul>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
											</ul>
										</li>
										<li>
											<h3>Volunteeres</h3>
											<Ul>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
											</ul>
										</li>
										<li>
											<h3>More</h3>
											<Ul>
												<li><a href="#">The post title of the article</a></li>
												<li><a href="#">The post title of the article</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</li>
							<li class="page-74"><a href="<?php echo home_url(); ?>/email-sign-up/">Subscribe</a></li>
							<li><a href="https://securedonations.omegafi.com/apps/securedonationsdesktop/zetabetatau/templates/zbt_donations_display.php" target="_blank">Donate</a></li>
							<li><a href="http://zbt.org/component/content/article/25.html" target="_blank">Make a Referral</a></li>
							<li class="archivedrop clickit"><a href="<?php echo home_url(); ?>/archive/">Archive <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
								<div class="mega-drop zbluebg">
									<!-- needs to be replaced with query of 4 Issues with live status, sorted DESC -->
									<ul class="drop-issue-arch">
										<li>
											<a href="#">
												<img src="<?php echo home_url(); ?>/wp-content/uploads/2016/07/sample-book.jpg" alt="" />
												Name of the Issue
											</a>
										</li>
										<li>
											<a href="#">
												<img src="<?php echo home_url(); ?>/wp-content/uploads/2016/07/sample-book.jpg" alt="" />
												Name of the Issue
											</a>
										</li>
										<li>
											<a href="#">
												<img src="<?php echo home_url(); ?>/wp-content/uploads/2016/07/sample-book.jpg" alt="" />
												Name of the Issue
											</a>
										</li>
										<li>
											<a href="#">
												<img src="<?php echo home_url(); ?>/wp-content/uploads/2016/07/sample-book.jpg" alt="" />
												Name of the Issue
											</a>
										</li>
										<li class="arch-all"><a href="<?php echo home_url(); ?>/archive/">View All</a></li>
									</ul>
								</div>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</section>
		<section class="logo-bar zgreybg">
			<div class="row">
				<div class="twelve columns">
					<a href="<?php echo home_url(); ?>" class="inbl">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/zbt-logo-blue.png" alt="ZBT Logo" width="137" height="135">
						<hgroup>
							<h1>The Digital Deltan<em>A Publication of Zeta Beta Tau Fraternity</em></h1>
							<h2>A Brotherhood of Kappa Nu, Phi Alpha, Phi Epsilon Pi, Phi Segma Delta and Zeta Beta Tau</h2>
						</hgroup>
					</a>
				</div>
			</div>
		</section>
	</header>
