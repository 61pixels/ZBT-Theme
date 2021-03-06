<?php get_header(); ?>

<main role="main">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
		<?php
			// lets figure out what type of post it is, standard, print, or chapter news, to use later on in layout
			$thetype = get_field('article_layout');
		?>
	<div class="single-post-art">
		<article class="main-content-wrap single-content-wrap zgreybg">
			<header class="art-intro tcenter zbluebg content-bar">
				<nav class="zbt-flex-nav">
					<span class="flex-prev"><?php next_post_link( '%link', '<i class="fa fa-chevron-left" aria-hidden="true"></i>', TRUE, ' ', 'issue_cats' ); ?> </span>
					<span class="flex-next"><?php previous_post_link( '%link', '<i class="fa fa-chevron-right" aria-hidden="true"></i>', TRUE, ' ', 'issue_cats' ); ?></span>
				</nav>
				<div class="row">
					<div class="ten columns centered">
						<?php if(has_category()) { ?>
						<p class="cat-info">
							<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>
						</p>
						<?php } ?>
						<h1><?php the_title(); ?></h1>
						<?php
							$theissues = get_the_terms( $post->ID, 'issue_cats');
							if ( $theissues && ! is_wp_error( $theissues ) ) {
								foreach ( $theissues as $theissue ) {
									$myissue = $theissue->name;
								}
							}
						?>
						<p class="author-meta">By <?php the_author_meta('display_name'); ?>, <span class="entry-date">in Issue: <?php echo $myissue; ?></span></p>
					</div>
				</div>
			</header>

			<?php
				if ($thetype == 'standard') { // we only want this main photo to appear on standard posts
					$featimg = get_field('photo');
					if ($featimg) { ?>
						<img src="<?php echo $featimg['sizes']['post-photo']; ?>" alt="<?php echo $featimg['alt'] ?>" class="sing-feat-img" />
			<?php
					}
				}
			?>
			<section class="sing-content content-bar-l p-content">
				<div class="row">
					<div class="ten columns centered">
						<?php the_content(); ?>

						<?php if( $thetype == 'zbtprint') { ?>
								<?php if( have_rows('print_items') ):
									while ( have_rows('print_items') ) : the_row();
										$bhoto = get_sub_field('print_photo'); 	?>
										<div class="row no-collapse print-row">
											<div class="four columns">
												<?php if($bhoto) : ?>
													<img src="<?php echo $bhoto['sizes']['print-cover']; ?>" alt="<?php echo $bhoto['alt'] ?>" class="" />
												<?php endif; ?>
											</div>
											<div class="eight columns">
												<h2><?php the_sub_field('print_title'); ?></h2>
												<p class="book-byline"><?php the_sub_field('byline'); ?></p>
												<div class="book-excerpt"><?php the_sub_field('print_summary');?></div>
											</div>
										</div>
									<?php endwhile;	?>
								<?php endif; ?>
						<?php } elseif ( $thetype == 'chapnews' ) { ?>
							<section class="anchor-sort-block">
							<?php
							if ( have_rows('chapter_news') ) {
								// Initialize array to hold story data.
								$stories = [];

								// Initialize arrys to hold nav data.
								$state_nav = [];
								$antecedent_nav = [];

								while ( have_rows( 'chapter_news' ) ) {
									the_row();
									$type         = get_sub_field('story_type');
									$value        = get_sub_field( $type );
									$field_object = get_sub_field_object( $type );
									$label        = $field_object['choices'][ $value ];
									$content      = get_sub_field( 'story_content' );

									// All stories go in this array. Used for display.
									$stories[] = array(
										'type'    => $type,
										'value'   => $value,
										'label'   => $label,
										'content' => $content
									);

									// Only state stories go in this array. Used for state nav.
									if ( 'state' == $type ) {
										$state_nav[ $label ] = $value;
									// Only antecedent stories go in this array. Used for antecedent nav.
									} elseif ( 'antecedent' == $type ) {
										$antecedent_nav[ $label ] = $value;
									}
								}

								// Display state nav if available.
								if ( ! empty( $state_nav ) ) {
									ksort( $state_nav );
									echo '<div class="cat-heading tcenter no-line">';
									echo '<div class="buffer">';
									echo '<h2>' . __( 'By State', 'zbt' ) . '</h2>';
									echo '</div></div>';
									echo '<ul class="inbl tcenter">';
										foreach ( $state_nav as $label => $value ) {
											echo '<li><a href="#' . $value . '">' . $value . '</a></li>';
										}
									echo '</ul>';
								}

								// Display antecedent nav if available.
								if ( ! empty( $antecedent_nav ) ) {
									ksort( $antecedent_nav );
									echo '<div class="cat-heading tcenter no-line">';
									echo '<div class="buffer">';
									echo '<h2>' . __( 'By Antecedent', 'zbt' ) . '</h2>';
									echo '</div></div>';
									echo '<ul class="inbl tcenter">';
										foreach ( $antecedent_nav as $label => $value ) {
											echo '<li><a href="#' . $value . '">' . $label . '</a></li>';
										}
									echo '</ul>';
								}
							?>
							</section>
							<?php
								foreach( $stories as $story ) {
							?>
									<a name="<?php echo $story['value']; ?>"></a>
									<section class="chap-news-row">
										<h2><?php echo $story['label']; ?><a href="#top" class="backtop"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a></h2>
										<?php echo $story['content']; ?>
									</section>
						<?php
								}
							}
						}
						?>

						<section class="share-bar">
							<ul class="inbl">
								<li><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title();?>" data-href="<?php the_permalink();?>" title="Share to Facebook" class="share-fb" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="http://twitter.com/share" data-text="<?php the_title();?>" data-url="<?php echo wp_get_shortlink(); ?>" title="Share to Twitter" class="share-twit" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
								<li class="share-it">Share this article</li>
							</ul>
						</section>
						<section class="comment-wrap">
							<?php comments_template( '', true ); ?>
						</section>
					</div>
				</div>
			</section>
		</article>
		<?php $showauth = get_field('show_author'); // only show author block if it's checked on backend?>
		<?php if( $thetype == 'standard' && $showauth == 1) { ?>
		<aside class="about-author tcenter content-bar-l">
			<div class="row">
				<div class="eight columns centered">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/author-test.jpg" alt="<?php the_author_meta('display_name'); ?> Photo" class="roundb" />
					<div class="cat-heading no-line">
		   				<div class="buffer">
		  				 	<h2>About the Author</h2>
		  				 </div>
		  			</div>
		  			<h3><?php the_author_meta('display_name'); ?></h3>
		  			<p><?php the_author_meta('description');?></p>
				</div>
			</div>
		</aside>
		<?php } elseif ( $thetype == 'zbtprint' ) { ?>
			<?php // lets grab our vars
				$bbanner = get_field('banner_text','option');
				$btitle = get_field('book_cta_title','option');
				$bcopy = get_field('book_cta_copy','option');
				$bbutton = get_field('book_cta_button_text','option');
				$blink = get_field('book_cta_page_link','option');
			?>
			<aside class="cta-submit-wrap tcenter content-bar-l">
				<div class="row">
				<div class="eight columns centered">
				<?php if($bbanner) { ?>
					<div class="cat-heading no-line">
		   				<div class="buffer">
		  				 	<h2><?php echo $bbanner; ?></h2>
		  				 </div>
		  			</div>
		  		<?php } ?>
		  		<?php if($btitle) { ?>
		  			<h3><?php echo $btitle; ?></h3>
		  		<?php } ?>
		  		<?php if($bcopy) { ?>
		  			<div class="book-sub-copy">
		  				<?php echo $bcopy; ?>
		  			</div>
		  		<?php } ?>
		  		<?php if($blink) { ?>
		  			<a href="<?php echo $blink; ?>" class="button large"><?php echo $bbutton; ?></a>
		  		<?php } ?>
				</div>
			</div>
			</aside>
		<?php } elseif ( $thetype == 'chapnews' ) { ?>
			<?php // lets grab our vars
				$cbanner = get_field('news_banner_text','option');
				$ctitle = get_field('news_cta_title','option');
				$ccopy = get_field('news_cta_copy','option');
				$cbutton = get_field('news_cta_button_text','option');
				$clink = get_field('news_cta_page_link','option');
			?>
			<aside class="cta-submit-wrap tcenter content-bar-l">
				<div class="row">
				<div class="eight columns centered">
				<?php if($cbanner) { ?>
					<div class="cat-heading no-line">
		   				<div class="buffer">
		  				 	<h2><?php echo $cbanner; ?></h2>
		  				 </div>
		  			</div>
		  		<?php } ?>
		  		<?php if($ctitle) { ?>
		  			<h3><?php echo $ctitle; ?></h3>
		  		<?php } ?>
		  		<?php if($ccopy) { ?>
		  			<div class="book-sub-copy">
		  				<?php echo $ccopy; ?>
		  			</div>
		  		<?php } ?>
		  		<?php if($clink) { ?>
		  			<a href="<?php echo $clink; ?>" class="button large"><?php echo $cbutton; ?></a>
		  		<?php } ?>
				</div>
			</div>
			</aside>
		<?php } ?>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>