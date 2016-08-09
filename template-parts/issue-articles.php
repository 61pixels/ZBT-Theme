<?php
/**
 * Displays all articles in the current issue in a combination of tiled and
 * column layouts.
 */
?>

<div class="main-content-wrap zgreybg content-bar-l">
	<!-- Tiled Layouts -->
	<?php
	$tiled_cats = array( 'features', 'alumni-chapter-news', 'foundation' );
	foreach ( $tiled_cats as $tiled_cat ) {
	?>
		<a name="<?php echo $tiled_cat; ?>"></a>
		<section class="archive-grid-section master-cats">
			<div class="row">
				<div class="twelve columns tcenter">
					<div class="cat-heading">
						<div class="buffer">
							<h2><?php echo get_term_by( 'slug', $tiled_cat, 'category' )->name; ?></h2>
						 </div>
						 <a href="#top" class="backtop"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				$articles = zbt_get_articles( $tiled_cat );
				$i = 0;
				foreach ( $articles as $post ) {
					setup_postdata( $post );
					// If first post, set up 6-column feature post.
					if ( 0 == $i ) {
						$article_class = 'bshad grid-featured';
						$columns_class = 'six columns';
						$excerpt = pixels_get_the_excerpt( 140 );

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
									echo '<img class="grid-img-main" src="' . get_stylesheet_directory_uri() . '/images/default-story-photo.jpg" alt="default story photo">';									
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
	<section class="archive-grid-section extra-cats">
		<div class="row">
			<div class="twelve columns">
				<ul class="block-grid four-up tablet-two-up mobile">
					<?php
					$column_cats = array( 'legacies', 'chapter-eternal', 'volunteers', 'more' );
					foreach ( $column_cats as $column_cat ) {
					?>
						<li>
							<a name="<?php echo $column_cat; ?>"></a>
							<div class="cat-heading tcenter no-line">
								<div class="buffer">
									<h2><?php echo get_term_by( 'slug', $column_cat, 'category' )->name; ?></h2>
								</div>
							</div>
							<article class="bshad">
								<section class="extra-grid-content">
									<?php
									$articles = zbt_get_articles( $column_cat );
									$i = 0;
									foreach ( $articles as $post ) {
										setup_postdata( $post );
										$excerpt = pixels_get_the_excerpt( 80 );
									?>
										<?php the_title('<h1><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h1>'); ?>
										<p><?php echo $excerpt; ?></p>
									<?php
									}
									wp_reset_postdata();
									?>
									<?php
									if ( 'legacies' == $column_cat ) {
										echo '<a href="#" class="extra-link">' . __( 'Recommend a Legacy >', 'zbt' ) . '</a>';
									}
									if ( 'volunteers' == $column_cat ) {
										echo '<a href="http://www.zbt.org/alumni/volunteering-with-zbt.html" target="_blank" class="extra-link">' . __( 'Volunteer Opportunities >', 'zbt' ) . '</a>';
									}
									?>
								</section>
							</article>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</section>
</div><!-- /main-content-wrap -->
