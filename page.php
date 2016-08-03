<?php get_header(); ?>

<main role="main">		
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
	<article class="single-page">	
		<div class="main-content-wrap single-content-wrap zgreybg">
			<header class="art-intro tcenter zbluebg content-bar">				
				<div class="row">
					<div class="ten columns centered">					
						<h1><?php the_title(); ?></h1>						
					</div>
				</div>
			</header>
					
			<section class="sing-content content-bar-l p-content">			
				<div class="row">				
					<div class="ten columns centered">
						<?php the_content(); ?>						
					</div>
				</div>
			</section>
		</div>		
	</article>					
	<?php endwhile; ?>
	<?php endif; ?>	
</main>

<?php get_footer(); ?>