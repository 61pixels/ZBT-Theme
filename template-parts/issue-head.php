<?php // this should be loaded on the home and any of the issue archive pages where it shows posts from the issue ?>
	<section class="issue-cats tcenter">
		<div class="row">
			<div class="twelve columns">
				<ul class="inbl"> <!-- these will be anchors down to sections on the page -->
					<li><a href="#features">Features</a></li>
					<li><a href="#alumni-chapter-news">Alumni &amp; Chapter News</a></li>
					<li><a href="#foundation">Foundation</a></li>
					<li><a href="#legacy">Legacies</a></li>
					<li><a href="#chapter-eternal">Chapter Eternal</a></li>
					<li><a href="#volunteers">Volunteers</a></li>
					<li><a href="#more">More</a></li>
				</ul>
				<ul>
			</div>
		</div>
	</section>
<?php if( is_front_page() || is_tax( 'issue_cats' ) ) { ?>
	<section class="featured-hero">
		<div class="flexslider">
			<!--
			obviously harcoded for now with some sample slides, need query here to output
			Query in this homepage case needs to pull all posts from the MOST RECENT Issue (determined by ACF taxonomy field 'published_date') that are in the featured category that ALSO have the ACF true/false field checked of 'slideshow_include'. Order should be set to 'rand'
			I can handle the foreach loop part once query is set.

			Will need to duplicate this query for the main archive issue pages as well. Difference is not most recent, but instead the current issue(term) you are viewing
			-->
			<ul class="slides">
				<li style="background-image:url('http://www.zbt.com/wp-content/uploads/2016/06/sample-photo2-600x338.jpg');">
					<span class="photo-overlay"></span>
					<div class="row"><div class="ten columns centered">
						<div class="cat-heading no-line reversed"><div class="buffer"><h2>Issue Name</h2></div></div>
						<a href="#">
							<h1>Featured Story Title</h1>
							<p>Here is some teaser Text</p>
						</a>
					</div>
				</li>
				<li style="background-image:url('http://www.zbt.com/wp-content/uploads/2016/06/sample-photo2-600x338.jpg');">
					<span class="photo-overlay"></span>
					<div class="row"><div class="ten columns centered">
						<div class="cat-heading no-line reversed"><div class="buffer"><h2>Issue Name</h2></div></div>
						<a href="#">
							<h1>Featured Story Title</h1>
							<p>Here is some teaser Text</p>
						</a>
					</div>
				</li>
				<li style="background-image:url('http://www.zbt.com/wp-content/uploads/2016/06/sample-photo2-600x338.jpg');">
					<span class="photo-overlay"></span>
					<div class="row"><div class="ten columns centered">
						<div class="cat-heading no-line reversed"><div class="buffer"><h2>Issue Name</h2></div></div>
						<a href="#">
							<h1>Featured Story Title</h1>
							<p>Here is some teaser Text</p>
						</a>
					</div>
				</li>
			</ul>
		</div><!-- /flexsldier -->
		<div class="zbt-flex-nav"><a href="#" class="flex-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a><a href="#" class="flex-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
	</section>
	<?php
		$abouthead = get_field('heading', 'option');
		$aboutcont = get_field('heading', 'option');
		if( $abouthead || $aboutcont) {
	?>
		<section class="issue-intro tcenter content-bar">
			<div class="row">
				<div class="ten columns centered">
					<h2><?php the_field('heading', 'option'); ?></h2>
					<?php the_field('content', 'option'); ?>
				</div>
			</div>
		</section>
	<?php } ?>
<?php } // is front_page ?>

