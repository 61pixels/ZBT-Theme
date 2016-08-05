<?php get_header(); ?>

<main role="main">

	<?php get_template_part( 'template-parts/issue-head' ); ?>

	<!-- Features -->
	<div class="main-content-wrap zgreybg content-bar-l">
		<a name="features"></a>
		<section class="archive-grid-section master-cats">
			<div class="row">
				<div class="twelve columns tcenter">
					<div class="cat-heading">
						<div class="buffer">
							<h2><?= __( 'Features', 'zbt' ); ?></h2>
						 </div>
						 <a href="#top" class="backtop"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<?php zbt_tile_articles( 'features' ); ?>
		</section>

		<!-- Alumni & Chapter News -->
		<a name="chapter"></a>
		<section class="archive-grid-section master-cats">
		   <div class="row">
				<div class="twelve columns tcenter">
					<div class="cat-heading ">
						<div class="buffer">
							<h2><?= __( 'Alumni &amp; Chapter News', 'zbt' ); ?></h2>
						 </div>
						 <a href="#top" class="backtop"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<?php zbt_tile_articles( 'alumni-chapter-news' ); ?>
		</section>

		<!-- Foundation -->
		<a name="chapter"></a>
		<section class="archive-grid-section master-cats">
			<div class="row">
				<div class="twelve columns tcenter">
					<div class="cat-heading ">
						<div class="buffer">
							<h2><?= __( 'Foundation', 'zbt' ); ?></h2>
						 </div>
						 <a href="#top" class="backtop"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<?php zbt_tile_articles( 'foundation' ); ?>
		</section>

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
