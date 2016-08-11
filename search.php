<?php get_header(); ?>

<main role="main">		
	<article class="search-page">	
		<div class="main-content-wrap search-content-wrap zgreybg">
			<header class="art-intro tcenter zbluebg content-bar">				
				<div class="row">
					<div class="ten columns centered">					
						<h1>Search Results</h1>						
					</div>
				</div>
			</header>					
			<section class="sing-content content-bar-l p-content">			
				<div class="row">				
					<div class="ten columns centered">
						<?php if (have_posts()) : ?>			
						<div class="archive-wrap">	
							<h1 class="archive-title">Found <?php echo $wp_query->found_posts ?> Results for "<span><?php the_search_query() ?></span>"</h1>
						</div>
						<?php while(have_posts()) : the_post(); ?>
							<?php get_template_part( 'template-parts/search-loop' ); ?>		
					  	<?php endwhile; else: ?>
							<h1>No Results Found</h1>
							<p>We're sorry, we could not find any results matching the search term "<strong><em><?php the_search_query() ?></em></strong>".</p>
						<?php endif; ?>						
						<div class="nav-previous"><?php previous_posts_link( __( '<i class="fa fa-chevron-left"></i> <span>Newer entries</span>' ) ); ?></div>	
						<div class="nav-next"><?php next_posts_link( __( '<span>Older entries</span> <i class="fa fa-chevron-right"></i>' ) ); ?></div>						
					</div>
				</div>
			</section>
		</div>		
	</article>					
</main>

<?php get_footer(); ?>