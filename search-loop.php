					<?php 	
					$the_type = $post->post_type;
					switch ($post->post_type) {
					// BLOG POSTS
					case 'post': ?>					
					<article class="post index-post search-result post-result">						
						<header class="entry-head clearfix">
							<?php if (has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>" class="index-feat">
								<?php the_post_thumbnail('thumbnail', array('class' => 'circ dshad')); ?>
							</a>	
							<?php endif; ?>
							<?php get_template_part( 'post-meta' ); ?>
							<h2><a href="<?php the_permalink(); ?>" class="dblue"><?php the_title(); ?></a></h2>							
						</header>	
						<div class="entry-content">                            
							<?php the_excerpt(); ?>	
						</div>
						<footer class="meta"> 
							<strong><a href="<?php the_permalink(); ?>" class="more">Continue Reading &#187;</a></strong>
						</footer>					
					</article>
						<?php break;						
					// PAGES RESULT
					case 'page': ?>
						<article class="post index-post search-result page-result">						
							<header class="entry-head clearfix">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span>(Page)</span></h2>								
							</header>					
							<div class="entry-content"><?php echo pixels_get_the_excerpt(150); ?> <a href="<?php the_permalink(); ?>" class="more">View Page</a></div>
						</article>						
						<?php break;						
										
					} ?>	