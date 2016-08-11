					<article class="post index-post search-result post-result">						
						<header class="entry-head clearfix">	
							<h2><a href="<?php the_permalink(); ?>" class="dblue"><?php the_title(); ?></a></h2>	
							<?php get_template_part( 'template-parts/post-meta' ); ?>						
						</header>	
						<div class="entry-content">                            
							<?php the_excerpt(); ?>	
						</div>								
					</article>