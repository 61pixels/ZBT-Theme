					<?php 	
					$the_type = $post->post_type;
					switch ($post->post_type) {
					// BLOG POSTS
					case 'post': ?>					
					<article class="post index-post">						
						<header>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span>(Fact)</span></h1>
							<?php get_template_part( 'post-meta' ); ?>
						</header>
						<div class="entry-content"><?php echo pixels_get_the_excerpt(200); ?> <a href="<?php the_permalink(); ?>" class=" more">Read More ></a></div>		
					</article>
						<?php break;						
					// PAGES RESULT
					case 'page': ?>
						<article class="post index-post">						
							<header>
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span>(Page)</span></h1>
								<?php get_template_part( 'post-meta' ); ?>
							</header>
							<div class="entry-content"><?php echo pixels_get_the_excerpt(200); ?> <a href="<?php the_permalink(); ?>" class=" more">Read More ></a></div>		
						</article>					
						<?php break;						
										
					} ?>	