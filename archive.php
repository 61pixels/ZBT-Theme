<?php get_header(); ?>	
	<main role="main">	
		<section class="blog-wrap">
			<div class="row">
				<div class="eight columns blog-cont-wrap">	
   
				<?php if (have_posts()) : ?>
					<?php the_post(); ?>
					<div class="archive-wrap">				
						<?php if(is_category() ) : ?>
							<h1 class="archive-title">Recent Posts In: <?php single_cat_title(); ?> </h1>
							<?php if(category_description()) { ?>
							<p class="archive-desc"><?php echo category_description(); ?></p>
							<?php } ?>
						<?php elseif ( is_author() ) : ?>
							<?php			
								$author_id = get_the_author_meta( 'ID' );
								$author_img = wp_get_attachment_image_src(get_field('author_photo', 'user_'. $author_id), 'thumbnail' );
								$author_job = get_field('user_job_title', 'user_'. $author_id );
								if ($author_img) { 
								?>
									<img src="<?php echo $author_img[0]; ?>" class="circ dshad left" style="width:100px;height:100px;" alt="<?php the_author(); ?>" />
								<?php } ?>							
						
							<h1 class="archive-title">All Posts By: <?php the_author(); ?> </h1>
							<p class="archive-desc"><?php the_author_meta('description'); ?></p>
						<?php elseif ( is_tag() || is_tax() ) : ?>
							<h1 class="archive-title">Archive: <?php single_tag_title(); ?> </h1>	
						<?php elseif ( is_month() ) : ?>
							<h1 class="archive-title">Archive: <?php the_time('F, Y'); ?> </h1>	
						<?php elseif ( is_year() ) : ?>
							<h1 class="archive-title">Archive: <?php the_time('Y'); ?> </h1>
						<?php endif; ?>
						<?php rewind_posts(); //rewinding before loop start ?>
					</div>
					<?php // start the loop ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'template-parts/blog-loop' ); ?>				
					<?php endwhile; else: ?>
						<p>Sorry, it looks like we haven't added any items yet!.</p>
					<?php endif; ?>		
										
				</div><!-- / columns -->			
			
			</div><!-- /row -->				
		</section><!-- /blog-wrap -->		
	</main>
<?php get_footer(); ?>