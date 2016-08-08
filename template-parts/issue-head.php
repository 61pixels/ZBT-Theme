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
			<?php
			$issue = zbt_get_issue(); // Gets current issue being viewed.
			$articles = zbt_get_articles( 'features', true ); // Features category, slideshow only.
			if ( ! empty( $articles ) ) {
				echo '<ul class="slides">';
					foreach ( $articles as $post ) {
						setup_postdata( $post );
						$teaser = get_field( 'custom_byline' );
			?>
						<li style="background-image:url('http://www.zbt.com/wp-content/uploads/2016/06/sample-photo2-600x338.jpg');">
							<span class="photo-overlay"></span>
							<div class="row"><div class="ten columns centered">
								<div class="cat-heading no-line reversed"><div class="buffer"><h2><?php echo $issue->name ?></h2></div></div>
								<a href="<?php the_permalink(); ?>">
									<?php the_title('<h1>', '</h1>'); ?>
									<p><?php echo $teaser; ?></p>
								</a>
							</div>
						</li>
			<?php
					}
					wp_reset_postdata();
				echo '</ul>';
			}
			?>
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

