					<article class="post index-post">						
						<header>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<?php get_template_part( 'template-parts/post-meta' ); ?>
						</header>
						<div class="entry-content"><?php echo pixels_get_the_excerpt(200); ?> <a href="<?php the_permalink(); ?>" class=" more">Read More ></a></div>		
					</article>