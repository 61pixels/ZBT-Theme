<div class="entry-meta"> 
	<div class="entry-dets">
		<span class="meta-published">Posted on <?php the_time( get_option('date_format') ); ?></span> <?php if(has_category()) { ?>in <span class="meta-categories"><?php the_category(', ') ?></span><?php } ?>
	</div>		
</div>