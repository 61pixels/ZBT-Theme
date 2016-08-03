		<?php
		// check if the flexible content field has rows of data
		if( have_rows('content_blocks') ):	
		
			// loop through the rows of data
			while ( have_rows('content_blocks') ) : the_row(); 
				// check current row layout
				if( get_row_layout() == 'centered_text_row' ): // if its the centered text  ?>		
			
				<section class="flex-content work-content content-bar-l p-content">
					<div class="row">
						<article class="ten columns centered tcenter open-content ">				
							<?php the_sub_field('centered_content');?>
						</article>		
					</div>
				</section>

				<?php elseif( get_row_layout() == 'photo_row' ): // photo row ?>
						<section class="flex-content flex-imgs">
						<?php 
							$columns = get_sub_field('how_many');
							switch ($columns) {
								case 'fullsize' : ?>
									<div class="twelve columns">								
										<?php
										$theimg = get_sub_field('photo_1'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>  
									</div>
								<?php break;
								case 'two_photos' : ?>
									<div class="six columns">
										<?php
										$theimg = get_sub_field('photo_1'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>								
									</div>
									<div class="six columns">								
										<?php
										$theimg = get_sub_field('photo_2'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>
									</div>
								<?php break;
								case 'three_photos' : ?>
									<div class="four columns">								
										<?php
										$theimg = get_sub_field('photo_1'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>
									</div>
									<div class="four columns">								
										<?php
										$theimg = get_sub_field('photo_2'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>
									</div>
									<div class="four columns">								
										<?php
										$theimg = get_sub_field('photo_3'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>
									</div>
								<?php break;
								case 'four_photo' : ?>
									<div class="three columns">		
										<?php
										$theimg = get_sub_field('photo_1'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>								
									</div>
									<div class="three columns">		
										<?php
										$theimg = get_sub_field('photo_2'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>								
									</div>
									<div class="three columns">		
										<?php
										$theimg = get_sub_field('photo_3'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>								
									</div>
									<div class="three columns">		
										<?php
										$theimg = get_sub_field('photo_4'); 
										if($theimg) : ?>	
										<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="" /><?php endif; ?>								
									</div>								
								<?php break;
							}
						?>				
						</section>		
				<?php elseif( get_row_layout() == 'image_fixed' ): // fixed img row ?>
					<?php $thebgcolor = get_sub_field('bar_bg_color'); ?>					
					<section class="content-bar-l p-content" <?php if($thebgcolor) : ?>style="background-color:<?php the_sub_field('bar_bg_color');?>;<?php endif; ?> clear:both;"> 
						<div class="row">
							<div class="twelve columns centered tcenter">				
								<?php
								$theimg = get_sub_field('photo_fixed'); 
								if($theimg) : ?>	
								<img src="<?php echo $theimg['url']; ?>" alt="<?php echo $theimg['alt'] ?>" class="aligncenter" /><?php endif; ?>
							</div>		
						</div>
					</section>

				<?php endif; ?>

			<?php endwhile; ?>
		<?php endif; ?>

