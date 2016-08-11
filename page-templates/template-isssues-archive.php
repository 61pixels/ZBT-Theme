<?php
/*
Template Name: Issues Archive Grid
*/
?>
<?php get_header(); ?>

<main role="main">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>

		<article class="main-content-wrap zgreybg">
			<header class="art-intro tcenter zbluebg content-bar">
				<div class="row">
					<div class="ten columns centered">
						<h1>Issues Archive</h1>
					</div>
				</div>
			</header>
			<section class="main-content-wrap zgreybg content-bar-l">
				<div class="row">
					<div class="twelve columns">
						<?php the_content(); ?>
						<?php
						$live_issues = zbt_get_live_issues();
						if ( ! empty( $live_issues ) ) {
							echo '<ul class="block-grid four-up tcenter issue-archs">';
								foreach ( $live_issues as $issue ) {
									$term_link = get_term_link( $issue );
									$cover_photo = get_field( 'cover_photo', $issue, false );
						?>
									<li>
										<a href="<?php echo $term_link; ?>">
										<?php if($cover_photo) {
											echo wp_get_attachment_image( $cover_photo, 'print-cover' ); 
										} else {
											echo '<img src="' . get_stylesheet_directory_uri() . '/images/default-issue-cover.jpg" alt="default issue cover">';											
										} ?>
											<?php echo $issue->name; ?>
										</a>
									</li>
						<?php
								}
							echo '</ul>';
						} else {
							echo '<h2>' . __( 'No published issues found.', 'zbt' ) . '</h2>';
						}
						?>
					</div>
				</div>
			</section>
		</article>
	<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>