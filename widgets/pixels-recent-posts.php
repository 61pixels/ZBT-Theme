<?php
/**
 * 61Pixels custom Recent Posts Widget
 *
 */
if( ! class_exists( 'pixels_widget_recent_posts' ) ) :
class pixels_widget_recent_posts extends WP_Widget {
	function pixels_widget_recent_posts() {
		$widget_ops = array('classname' => 'pixels_recent_posts', 'description' => __( "The most recent posts on your site") );
		$this->WP_Widget( 'pixels_widget_recent_posts', __( 'Pixels Latest Posts' ), $widget_ops );
	}
	function widget($args, $instance) {
		extract($args);		
		$title = ( $instance['title'] != '' ) ? esc_attr( $instance['title'] ) : __( 'Pixels Latest Posts' );
		$ex = ! empty( $instance['show_excerpt'] ) ? '1' : '0';
		$date = ! empty( $instance['show_date'] ) ? '1' : '0';
		$more = ! empty( $instance['show_more'] ) ? '1' : '0';
		$all = ! empty( $instance['show_all'] ) ? '1' : '0';
		
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 			$number = 10;
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if ($r->have_posts()) :?>
			<?php echo $before_widget; ?>
			<?php if ( $title ) echo $before_title . $title . $after_title; ?>
			<ul>			
			<?php  while ($r->have_posts()) : $r->the_post(); ?>
				<li>
					<a href="<?php the_permalink();?>" class="title"><?php the_title(); ?></a>
					<?php if ($date) { ?>
					<span class="date"><?php the_time('F j, Y'); ?></span>
					<?php } ?>
					<?php if ($ex) { 
					 echo pixels_get_the_excerpt(100); 
					} ?>
					<?php if ($more) { ?>
					 <br /><a href="<?php the_permalink();?>" class="more">Read More</a>
					<?php } ?>
				</li>
			<?php endwhile; ?>	
			</ul>
			<?php if ($all) :
				if (get_option('show_on_front')=='page') {
				  $page_id = get_option('page_for_posts');
				  $page = get_permalink($page_id); ?>
					<a href="<?php echo $page; ?>" class="all">Read All >></a>
				<?php } else { ?>
					<a href="/" class="more">Read All >></a>
				<?php } ?>			
			<?php endif; ?>
			<?php echo $after_widget; ?>
			<?php // Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();
		endif;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];	
		$instance['show_excerpt'] = !empty($new_instance['show_excerpt']) ? 1 : 0;
		$instance['show_date'] = !empty($new_instance['show_date']) ? 1 : 0;
		$instance['show_more'] = !empty($new_instance['show_more']) ? 1 : 0;
		$instance['show_all'] = !empty($new_instance['show_all']) ? 1 : 0;
		return $instance;
	}
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		$show_excerpt = isset( $instance['show_excerpt'] ) ? (bool) $instance['show_excerpt'] : false;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_more = isset( $instance['show_more'] ) ? (bool) $instance['show_more'] : false;
		$show_all = isset( $instance['show_all'] ) ? (bool) $instance['show_all'] : false;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
		
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_excerpt'); ?>" name="<?php echo $this->get_field_name('show_excerpt'); ?>"<?php checked( $show_excerpt ); ?> />
		<label for="<?php echo $this->get_field_id('show_excerpt'); ?>"><?php _e( 'Show Excerpt' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>"<?php checked( $show_date ); ?> />
		<label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e( 'Show Date' ); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_more'); ?>" name="<?php echo $this->get_field_name('show_more'); ?>"<?php checked( $show_more ); ?> />
		<label for="<?php echo $this->get_field_id('show_more'); ?>"><?php _e( 'Show Read More for each post' ); ?></label><br />
		
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_all'); ?>" name="<?php echo $this->get_field_name('show_all'); ?>"<?php checked( $show_all ); ?> />
		<label for="<?php echo $this->get_field_id('show_all'); ?>"><?php _e( 'Show Read All Link' ); ?></label>
		</p>
<?php
	}
}
endif;
	register_widget('pixels_widget_recent_posts');
?>