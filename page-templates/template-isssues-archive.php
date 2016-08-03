<?php
/*
Template Name: Issues Archive Grid
*/
?>
<?php get_header(); ?>

<main role="main">		
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
		
		<article class="main-content-wrap zgreybg">
			<header class="art-intro tcenter zbluebg content-bar">				
				<div class="row">
					<div class="ten columns centered">						
						<h1>Issues Archive</h1>						
					</div>
				</div>
			</header>
				
			<section class="main-content-wrap zgreybg content-bar-l">		
				<div class="row">				
					<div class="twelve columns">
						<?php the_content(); ?>	
						<?php 
						// query goes here, needs to output all Issues in DESC order (newest first), sorted by ACF date field 'published_date' and only ones that have 'issue_status" ACF field = live
						// Issues taxonomy is issue_cats
						// needs to display cover photo, acf field 'cover_photo' and issue title, both clickable to issue archive page
						// sample html:
						?>
						<!--<ul class="block-grid four-up">
							<li>
								<a href="issuearchivelink">
									<img src="the cover_photo img size print-cover" alt="img alt" />
									Issue Title Here
								</a>
							</li>
							<li>
								<a href="issuearchivelink">
									<img src="the cover_photo img size print-cover" alt="img alt" />
									Issue Title Here
								</a>
							</li>
							<li>
								<a href="issuearchivelink">
									<img src="the cover_photo img size print-cover" alt="img alt" />
									Issue Title Here
								</a>
							</li>
							<li>
								<a href="issuearchivelink">
									<img src="the cover_photo img size print-cover" alt="img alt" />
									Issue Title Here
								</a>
							</li>
							<li>
								<a href="issuearchivelink">
									<img src="the cover_photo img size print-cover" alt="img alt" />
									Issue Title Here
								</a>
							</li>
						</ul>-->
					</div>
				</div>
			</section>
		</article>				
	<?php endwhile; ?>
	<?php endif; ?>	
</main>

<?php get_footer(); ?>