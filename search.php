<?php get_header(); ?>	

<div class="int-page-wrap content-bar-l">
	<main role="main">	
		<section class="main-content-wrap">
			<div class="row">					
				<div class="eight columns p-content search-results">	
					<?php if (have_posts()) : ?>			
					<div class="archive-wrap">	
						<h1 class="archive-title">Found <?php echo $wp_query->found_posts ?> Results for "<span><?php the_search_query() ?></span>"</h1>
					</div>
					<?php while(have_posts()) : the_post(); ?>
						<?php get_template_part( 'template-parts/blog-loop' ); ?>		
				  	<?php endwhile; else: ?>
						<h1>No Results Found</h1>
						<p>We're sorry, we could not find any results matching the search term "<strong><em><?php the_search_query() ?></em></strong>".</p>
					<?php endif; ?>	
					<?php wp_pagenavi(); ?>
					<div class="nav-previous"><?php previous_posts_link( __( '<i class="fa fa-chevron-left"></i> <span>Newer entries</span>' ) ); ?></div>	
					<div class="nav-next"><?php next_posts_link( __( '<span>Older entries</span> <i class="fa fa-chevron-right"></i>' ) ); ?></div>					
				</div>	
				<div class="four columns">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>		
			</div><!-- /row -->		
		</section>
	</main>
</div>	

<?php get_footer(); ?>
