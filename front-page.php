<?php get_header(); ?>

<main role="main">	

	<?php get_template_part( 'template-parts/issue-head' ); ?>

	<div class="main-content-wrap zgreybg content-bar-l">	 
	 <!-- this is the main query area, I'm thinking there are individual queries for each section since the last 4 categories have a totally different layout 
	 So a query from current issue for Featured category first, then new query for next etc.. If there is a better way I'm open -->
		<a name="features"></a>
	   <section class="archive-grid-section master-cats">	   	
		   <div class="row">
		   		<div class="twelve columns tcenter">
		   			<div class="cat-heading">
		   				<div class="buffer">
		  				 	<h2>Features</h2>
		  				 </div>
		  				 <a href="#top" class="backtop"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
		  			</div>
		  		</div>
		  	</div>		  	
		  	<div class="row">
		  		<div class="six columns">
		  			<article class="bshad grid-featured">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>	
		  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
		  					<a href="#" class="grid-more">Read Story</a>
		  				</section>
		  			</article>
		  		</div>
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  	</div><!-- row -->
		  	<div class="row">
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>		  		
		  		<div class="three columns last"> <!-- last item needs class of last added -->
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  	</div>
		</section>

		<!-- Next Category, Alumni & Chapter News -->
  		<a name="chapter"></a>
		<section class="archive-grid-section master-cats">	 
		   <div class="row">
		   		<div class="twelve columns tcenter">
		   			<div class="cat-heading ">
		   				<div class="buffer">
		  				 	<h2>Alumni &amp; Chapter News</h2>
		  				 </div>
		  				 <a href="#top" class="backtop"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
		  			</div>
		  		</div>
		  	</div>	
		  	<div class="row">
		  		<div class="six columns">
		  			<article class="bshad grid-featured">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>	
		  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
		  					<a href="#" class="grid-more">Read Story</a>
		  				</section>
		  			</article>
		  		</div>
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  		<div class="three columns">
		  			<article class="bshad">
		  				<figure class="grid-hover-item">
		  					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/large-test.jpg" alt="" class="grid-img-main" />
		  					<a href="<?php the_permalink();?>" class="grid-mask-meta">					
								<span class="button binversed">More</span>
							</a>
						</figure>
						<section class="post-grid-content">
		  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
		  					<a href="#" class="grid-more">Read Story</a>  				
		  				</section>		  		
		  			</article>
		  		</div>
		  	</div><!-- row -->		  	
		</section>
		<!-- Foundation category removed just for simplicity sake for now, but that woudl go here next with same layout as above-->

		<!-- four column extra categorys with diff layout -->
		<a name="legacy"></a>
		<section class="archive-grid-section extra-cats">
			<div class="row">	 
				<div class="twelve columns">
				   <ul class="block-grid four-up tablet-two-up mobile">
				   		<li>
				   			<div class="cat-heading tcenter no-line">
				   				<div class="buffer">
				  				 	<h2>Legacies</h2>
				  				 </div>		  				
				  			</div>
				  			<article class="bshad">		  				
								<section class="extra-grid-content">
				  					<h1><a href="#">Feature article lorem ipsum dolor sit amet consectur</a></h1>
				  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, con sectetur adipisicing elit, sed do eiusmod tempor. sectetur adipisicing elit, sed do eiusmod tempor. </p>
				  					<a href="#" class="grid-more">Recommend a Legacy ></a>  				
				  				</section>		  		
				  			</article>
				  		</li>
				  		<li>
				  			<a name="eternal"></a>
				   			<div class="cat-heading tcenter no-line">
				   				<div class="buffer">
				  				 	<h2>Chapter Eternal</h2>
				  				 </div>		  				
				  			</div>
				  			<article class="bshad">		  				
								<section class="extra-grid-content">
				  					<h1><a href="#">Some Title Here.</a></h1>
				  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
				  					<h1><a href="#">Obituary: John Doe</a></h1>
				  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
				  				</section>		  		
				  			</article>
				  		</li>
				  			<li>
				  			<a name="volunteer"></a>
				   			<div class="cat-heading tcenter no-line">
				   				<div class="buffer">
				  				 	<h2>Volunteers</h2>
				  				 </div>		  				
				  			</div>
				  			<article class="bshad">		  				
								<section class="extra-grid-content">
				  					<h1><a href="#">Volunteeer: James Johnston</a></h1>
				  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, con sectetur adipisicing elit, sed do</p>
				  					<a href="#" class="grid-more">Volunteer Opportunities ></a>  				
				  				</section>		  		
				  			</article>
				  		</li>
				  			<li>
				  			<a name="more"></a>
				   			<div class="cat-heading tcenter no-line">
				   				<div class="buffer">
				  				 	<h2>More</h2>
				  				 </div>		  				
				  			</div>
				  			<article class="bshad">		  				
								<section class="extra-grid-content">
				  					<h1><a href="#">Letters from our leaders</a></h1>
				  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
				  					<h1><a href="#">Some Title Here</a></h1>
				  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>				
				  				</section>		  		
				  			</article>
				  		</li>
				  	</ul>
		  		</div>
		 	 </div>
		  </section>

	</div><!-- /main-content-wrap -->
</main>

<?php get_footer(); ?>