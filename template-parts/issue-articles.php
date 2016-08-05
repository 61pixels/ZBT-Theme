<?php
/**
 * Displays all articles in the current issue in a combination of tiled and
 * column layouts.
 */
?>

<div class="main-content-wrap zgreybg content-bar-l">
	<!-- Tiled Layouts -->
	<?php
	$categories = array( 'features', 'alumni-chapter-news', 'foundation' );
	foreach ( $categories as $category ) {
	?>
		<a name="<?php echo $category; ?>"></a>
		<section class="archive-grid-section master-cats">
			<div class="row">
				<div class="twelve columns tcenter">
					<div class="cat-heading">
						<div class="buffer">
							<h2><?php echo get_term_by( 'slug', $category, 'category' )->name; ?></h2>
						 </div>
						 <a href="#top" class="backtop"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				$articles = zbt_get_articles( $category );
				$i = 0;
				foreach ( $articles as $post ) {
					setup_postdata( $post );
					// If first post, set up 6-column feature post.
					if ( 0 == $i ) {
						$article_class = 'bshad grid-featured';
						$columns_class = 'six columns';
						$excerpt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...';
					// Otherwise set up 3-column post.
					} else {
						$article_class = 'bshad';

						// If last post, add 'end' to prevent hanging tile.
						if ( $i + 1 == count( $articles ) ) {
							$columns_class = 'three columns end';
						} else {
							$columns_class = 'three columns';
						}

						$excerpt = '';
					}

					// Determines if new row is necessary. Works for infinite rows.
					if ( $i > 4 && $i % 4 == 1 ) {
						echo '</div>';
						echo '<div class="row">';
					}
				?>
					<div class="zbt-tile <?php echo $columns_class; ?>">
						<article class="<?php echo $article_class; ?>">
							<figure class="grid-hover-item">
								<?php
								// If ACF photo is set, use it.
								if ( ! empty( $photo ) ) {
									echo wp_get_attachment_image( $photo['ID'], 'main-photo', false, array( 'class' => 'grid-img-main' ) );
								// Otherwise fall back to default photo.
								} else {
									echo '<img class="grid-img-main" src="' . get_stylesheet_directory_uri() . '/images/large-test.jpg" alt="">';
									// echo'<img class="grid-img-main" src="' . get_stylesheet_directory_uri() . '/images/default-photo.jpg" alt="">';
								}
								?>
								<a class="grid-mask-meta" href="<?php the_permalink(); ?>"><span class="button binversed"><?php _e( 'More', 'zbt' ); ?></span></a>
							</figure>
							<section class="post-grid-content">
								<?php the_title('<h1><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h1>'); ?>
								<?php echo $excerpt ? '<p>' . $excerpt . '<p>' : null; ?>
								<a class="grid-more" href="<?php the_permalink(); ?>"><?php _e( 'Read Story', 'zbt' ); ?></a>
							</section>
						</article>
					</div>
					<?php $i++; ?>
				<?php
				}
				wp_reset_postdata();
				?>
			</div>
		</section>
	<?php } ?>

	<!-- Four Column Layout -->
	<a name="legacy"></a>
	<section class="archive-grid-section extra-cats">
		<div class="row">
			<div class="twelve columns">
			   <ul class="block-grid four-up tablet-two-up mobile">
					<li>
						<div class="cat-heading tcenter no-line">
							<div class="buffer">
								<h2>Legacies</h2>
							 </div>
						</div>
						<article class="bshad">
							<section class="extra-grid-content">
								<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, con sectetur adipisicing elit, sed do eiusmod tempor. sectetur adipisicing elit, sed do eiusmod tempor. </p>
								<a href="#" class="grid-more">Recommend a Legacy ></a>
							</section>
						</article>
					</li>
					<li>
						<a name="eternal"></a>
						<div class="cat-heading tcenter no-line">
							<div class="buffer">
								<h2>Chapter Eternal</h2>
							 </div>
						</div>
						<article class="bshad">
							<section class="extra-grid-content">
								<h1><a href="#">Some Title Here.</a></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
								<h1><a href="#">Obituary: John Doe</a></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
							</section>
						</article>
					</li>
						<li>
						<a name="volunteer"></a>
						<div class="cat-heading tcenter no-line">
							<div class="buffer">
								<h2>Volunteers</h2>
							 </div>
						</div>
						<article class="bshad">
							<section class="extra-grid-content">
								<h1><a href="#">Volunteeer: James Johnston</a></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, con sectetur adipisicing elit, sed do</p>
								<a href="#" class="grid-more">Volunteer Opportunities ></a>
							</section>
						</article>
					</li>
						<li>
						<a name="more"></a>
						<div class="cat-heading tcenter no-line">
							<div class="buffer">
								<h2>More</h2>
							</div>
						</div>
						<article class="bshad">
							<section class="extra-grid-content">
								<h1><a href="#">Letters from our leaders</a></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
								<h1><a href="#">Some Title Here</a></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
							</section>
						</article>
					</li>
				</ul>
			</div>
		</div>
	</section>
</div><!-- /main-content-wrap -->
