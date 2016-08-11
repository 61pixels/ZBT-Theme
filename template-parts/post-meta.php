<div class="entry-meta"> 	
	<?php if(has_term('', 'issue_cats')) { ?>Issue: <span class="meta-cats">
	<?php $terms = get_the_terms( $post->ID , 'issue_cats' ); 
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term, 'issue_cats' );
            if( is_wp_error( $term_link ) )
            continue;
        echo '<a href="' . $term_link . '">' . $term->name . '</a>';
        } 
    ?>
	</span><?php } ?>	
</div>


