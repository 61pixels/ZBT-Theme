<?php get_header(); ?>	

<div class="int-page-wrap content-bar-l">
	<main role="main">	
		<section class="main-content-wrap">
			<div class="row">					
				<div class="eight columns p-content">	
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<?php get_template_part( 'template-parts/blog-loop' ); ?>		
					  	 <?php endwhile; else: ?>
						<p>Sorry, it looks like we haven't added any items yet!.</p>
					<?php endif; ?>	
					<?php wp_pagenavi(); ?>		
					<div class="nav-previous"><?php previous_posts_link( __( '<i class="fa fa-chevron-left"></i> <span>Newer entries</span>' ) ); ?></div>	
					<div class="nav-next"><?php next_posts_link( __( '<span>Older entries</span> <i class="fa fa-chevron-right"></i>' ) ); ?></div>					
				</div>	
				<div class="four columns">
					<div class="sidebar" role="complementary">
						<?php get_sidebar(); ?>
					</div>
				</div>		
			</div><!-- /row -->		
		</section>
	</main>
</div>	

<?php get_footer(); ?>
