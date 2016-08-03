<?php // DEFAULT MASTER FUNCTIONS 
// disabling stupid 4.4 responsive images
add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );

// requiring any custom files for include
include_once 'includes/class-pixels-navigation-menu.php'; 

// including javascript files correctly
function pixels_scripts() {
    if (!is_admin()){		
		wp_enqueue_script('jquery'); 	
        wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.foundation.js', array( 'jquery' ), 1.0, true);
        wp_enqueue_script('fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), 1.0, true);
        wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), 1.0, true);
		if(is_front_page()) {
			
		}
		if(is_singular() || is_page()) {	
			
		}
		if(is_single()) { // load only on single blog posts
		 
		}	  
        wp_enqueue_script('myfunctions_js', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), 1.0, true);
        // removing IssueM Flexslider and CSS  	
        wp_deregister_style( 'jquery-issuem-flexslider');
		wp_dequeue_script( 'jquery-issuem-flexslider' );
    }
}
add_action('wp_enqueue_scripts', 'pixels_scripts');

// on creation set all pages order to 99 by default to make sorting after the fact easier
add_action('wp_insert_post_data', 'set_order_to_high', 10, 2);
function set_order_to_high($data, $postarr) {
    if ($postarr['ID'] === 0) {
        $data['menu_order'] = 1000;
    }
    return $data;
}
// lower priority of SEO metabox 
add_filter( 'wpseo_metabox_prio', function() { return 'low';});

// lets add back in the WP Editor on page for posts. Was removed in 4.2.2
if( ! function_exists('fix_no_editor_on_posts_page')) {
	function fix_no_editor_on_posts_page($post)	{
		if($post->ID != get_option('page_for_posts') || post_type_supports('page', 'editor'))
			return;
		remove_action('edit_form_after_title', '_wp_posts_page_notice');
		add_post_type_support('page', 'editor');
	}
	add_action('edit_form_after_title', 'fix_no_editor_on_posts_page', 0);
}

// lets set image links to be none by default
function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

// better custom excerpts allows counts based on characters in stead of words, call this instead of the_excerpt to pass in amount of character on the fly
function pixels_get_the_excerpt($length = 55, $more = false) {
	$excerpt = get_the_excerpt();
	$excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $length);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
	if ($more) {
		$excerpt = $excerpt . $more;
	}
	return $excerpt . '...';
}

// custom title lengths, pass in number and it will trim
function pixels_get_the_title($length = null) {
	if ($length && strlen(get_the_title()) > $length) {
		$title = substr(get_the_title(), 0, $length);
		$title = substr($title, 0, strripos($title, " "));
		return $title . '...';
	} else {
		return get_the_title();
	}
}

// custom ACF field lengths, pass in number and it will trim
// example call of: echo pixels_length(250, get_field('field_name_here')); 
function pixels_length($length = null, $field) {
	if ($length && strlen($field) > $length) {
		$result = substr($field, 0, $length);
		$result = substr($field, 0, strripos($result, " "));
		return $result . '...';	
	} else {
		return $field;
	}
}
// Custom HEX -> RGB conversion for use with ACF
function hex2rgb($hex) { 
	$hex = str_replace("#", "", $hex); 
	if(strlen($hex) == 3) { 
		$r = hexdec(substr($hex,0,1).substr($hex,0,1)); 
		$g = hexdec(substr($hex,1,1).substr($hex,1,1)); 
		$b = hexdec(substr($hex,2,1).substr($hex,2,1)); 
	} else { 
		$r = hexdec(substr($hex,0,2)); 
		$g = hexdec(substr($hex,2,2)); 
		$b = hexdec(substr($hex,4,2)); 
	} 
	$rgb = array($r, $g, $b); 
	return $rgb; 
} 

// -----------------------------------------------------------------------------------
// BANNERS - LOOK FOR BANNER IMAGE AND IF NOT, GO UP TO EACH PARENT AND CHECK THERE AND DISPLAY
// recursively looks for featured images
function get_featured_recursive($post) {
	if (get_field('hero_background_photo', $post->ID )) {
		return $post->ID;
	} else if ($post->post_parent != 0) {
		return get_featured_recursive(get_post($post->post_parent));
	} else {
		return null;
	}
}

// fixing oembed z-index bug
function stf_embed_filter( $html, $data, $url ){
    $html = preg_replace('!(<object[^>]*>)(.*?)</object>!is', "$1$2<param name=\"wmode\" value=\"opaque\"></object>", $html);
    $html = preg_replace('!(<embed[^>](.*?)>)(.*?)</embed>!is', "<embed $2 wmode=\"opaque\">$3</embed>", $html);
    return $html;
}
add_filter('oembed_dataparse', 'stf_embed_filter', 90, 3 );

// registering and setting up WP to support features
//add_theme_support( 'post-thumbnails' );	
add_image_size('print-cover', 175, 265, true);
add_image_size('main-photo', 485, 340, true);
add_image_size('post-photo', 1000, 425, true);

// adding in semantic features 
$args = array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption'
);
add_theme_support( 'html5', $args );

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// lets add an ACF options page
if( function_exists('acf_add_options_page') ) {  
  acf_add_options_page('Xtra Content');   
}

// NEed to include anchor library js seperatly
function my_mce_external_plugins($plugins) {
    $plugins['anchor'] = get_stylesheet_directory_uri().'/includes/anchor.plugin.min.js';
    return $plugins;
}
add_filter('mce_external_plugins', 'my_mce_external_plugins');

// ADD IN EXTRA TINY MC BUTTONS
function add_more_buttons($buttons) {
 $buttons[] = 'subscript';
 $buttons[] = 'superscript';
 $buttons[] = 'anchor';
 return $buttons;
}
add_filter("mce_buttons_2", "add_more_buttons");

// REMOVE NEW FONT COLOR BOX 
function remove_color_buttons($buttons) {
      //Remove the text color selector
      $remove = 'forecolor';     
      if ( ( $key = array_search($remove,$buttons) ) !== false )
		unset($buttons[$key]);
      return $buttons;
 }
add_filter('mce_buttons_2','remove_color_buttons');

// REMOVE underline
function remove_underline_buttons($buttons) {
      //Remove the text color selector
      $remove = 'underline';     
      if ( ( $key = array_search($remove,$buttons) ) !== false )
		unset($buttons[$key]);
      return $buttons;
 }
add_filter('mce_buttons_2','remove_underline_buttons');

// add back in the editor to the posts page that was removed in 4.2
if( ! function_exists('crgeary_fix_no_editor_on_posts_page')) {
  function crgeary_fix_no_editor_on_posts_page($post) {
    if($post->ID != get_option('page_for_posts') || post_type_supports('page', 'editor'))
      return;    
    remove_action('edit_form_after_title', '_wp_posts_page_notice');
    add_post_type_support('page', 'editor');
  }
  add_action('edit_form_after_title', 'crgeary_fix_no_editor_on_posts_page', 0);
}

// custom loading of fonts  for heading tags
function thsp_mce_csspt( $mce_css ) {  
    // Check protocol
    $protocol = is_ssl() ? 'https' : 'http';
    $mce_css .= ', ' . $protocol . '://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700';        
    return $mce_css;
}
add_filter( 'mce_css', 'thsp_mce_csspt' );

// remove unnecessary header items wordpress injects
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
// remove emoji items from 4.2+
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// lets only keep 10 revisions of each page
add_filter( 'wp_revisions_to_keep', 'filter_function_name', 10, 2 );
function filter_function_name( $num, $post ) {  
	$num = 10;  
    return $num;
}

// add pdf and other options to sort option in media library
function modify_post_mime_types( $post_mime_types ) {
	// select the mime type, here: 'application/pdf'
	// then we define an array with the label values
	$post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
	$post_mime_types['application/msword'] = array( __( 'Word Docs' ), __( 'Manage Word Docs' ), _n_noop( 'Word Doc <span class="count">(%s)</span>', 'Word Docs <span class="count">(%s)</span>' ) );		
	// then we return the $post_mime_types variable
	return $post_mime_types;
}
// Add Filter Hook
add_filter( 'post_mime_types', 'modify_post_mime_types' );

//  Add in VCF to supported uploaded mime types
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// add your extension to the array
	$existing_mimes['vcf'] = 'text/x-vcard';
	return $existing_mimes;
}
// WORDPRESS GALLERIES
// lets add rel tags to wordpress gallery images
add_filter('wp_get_attachment_link', 'rc_add_rel_attribute');
function rc_add_rel_attribute($link) {
  global $post;
  return str_replace('<a href', '<a rel="prettyPhoto[pp_gal]" href', $link);
}
// lets link to the large size by default instead of full size
function px_get_attachment_link_filter( $content, $post_id, $size, $permalink ) {
    if (! $permalink) {
        $image = wp_get_attachment_image_src( $post_id, 'large' );
        $new_content = preg_replace('/href=\'(.*?)\'/', 'href=\'' . $image[0] . '\'', $content );
        return $new_content;
    } else {
        return $content;
    }
} 
add_filter('wp_get_attachment_link', 'px_get_attachment_link_filter', 10, 4);

// -----------------------------------------------------------------------------------
//	NAV AND SIDEBARS
// -----------------------------------------------------------------------------------
// adding in menu support
register_nav_menus(
	array(
	  'global_menu' => 'Primary Navigation',
	  'foot_menu' => 'Footer Navigation' 
	)
);
// Register Sidebars
register_sidebar( array(
	'name' => 'General Pages' ,
	'id' => 'General-1',
	'description' => 'Sidebar for general pages on the site',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title'  => '<h3 class="widgettitle red oswald">',
	'after_title'   => '</h3>'
) );

// ==  Browser Classes  ==============================

add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) $classes[] = 'ie';
    else $classes[] = 'unknown';
    if($is_iphone) $classes[] = 'iphone';
    return $classes;
}

// -----------------------------------------------------------------------------------
//	Custom Login Support
// -----------------------------------------------------------------------------------
function pixel_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_template_directory_uri().'/images/login-logo.png) !important; width:150px !important;height:150px !important;margin:0 auto !important;background-size:auto !important;}
    </style>';
}
function pixel_wp_login_url($url) {
	 return get_bloginfo( 'url' );
}
add_action('login_head', 'pixel_custom_login_logo');
add_filter('login_headerurl', 'pixel_wp_login_url');

// Update Wordpress login error messages to be more secure and generic
function no_login_error() {
    return 'Oops! Wrong Credentials.';
} 
add_filter('login_errors','no_login_error');

// -----------------------------------------------------------------------------------
//	MENUS AND HIGHLIGHTING ADJUSTMENTS
// -----------------------------------------------------------------------------------

// customizing nav menu classes to work with XXXXX single items
// As of WP 3.1.1 addition of classes for css styling to parents of custom post types doesn't exist.
// We want the correct classes added to the correct custom post type parent in the wp-nav-menu for css styling and highlighting, so we're modifying each individually...
// The id of each link is required for each one you want to modify
function remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{
     switch (get_post_type())
     {
     	case 'sm-location': // locations single
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");
     		if (in_array('menu-item-21', $classes)) // make locations page active
     		{
     		   $classes[] = 'current_page_parent';
            }
            break;
         case 'tools_cpt': // ONline Tools    		
     		$classes = array_filter($classes, "remove_parent_classes");     		
     		if (in_array('menu-item-22', $classes)) // online tools page active
     		{
     		   $classes[] = 'current_page_parent';
            }
            break;
         case 'products_cpt': // Products    		
     		$classes = array_filter($classes, "remove_parent_classes");     		
     		if (in_array('menu-item-23', $classes)) // products page active
     		{
     		   $classes[] = 'current_page_parent';
            }
            break;
     	case 'attachment':
     		// we're viewing an attachment, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");     		
     		break;     	
      // add more cases if necessary and/or a default
     }
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');

// 404 page by default highlights main posts page, so lets remove that
function remove_404_highlight($classes)
{
	if ( is_404() || is_search() ) {
			// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
			$classes = array_filter($classes, "remove_parent_classes");			
		 return $classes;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'remove_404_highlight');


// -----------------------------------------------------------------------------------
//	ADMIN SUPPORT
// -----------------------------------------------------------------------------------

// removing many default wordpress metabxoes from dashboard automatically
add_action('admin_init', 'pixels_remove_dashboard_widgets');
function pixels_remove_dashboard_widgets() {
//remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // right now
remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // incoming links
remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // plugins
remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');  // quick press
remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal');  // recent drafts
remove_meta_box('dashboard_primary', 'dashboard', 'normal');   // wordpress blog
remove_meta_box('dashboard_secondary', 'dashboard', 'normal');   // other wordpress news
remove_meta_box('dashboardb_range', 'dashboard', 'normal');   // remove latest news from range, comes from some plugin
}

// Change all users display name to first + last by default instead of username
function force_pretty_displaynames($user_login, $user) {
    $outcome = trim(get_user_meta($user->ID, 'first_name', true) . " " . get_user_meta($user->ID, 'last_name', true));
    if (!empty($outcome) && ($user->data->display_name!=$outcome)) {
      wp_update_user( array ('ID' => $user->ID, 'display_name' => $outcome));    
    }
}
add_action('wp_login','force_pretty_displaynames',10,2); 

// custom youtube embeds with no related, etc
// customize embed settings
function custom_youtube_settings($code){
    if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
        $return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&autohide=0&modestbranding=1", $code);
        return $return;
    }
    return $code;
} 
add_filter('embed_handler_html', 'custom_youtube_settings');
add_filter('embed_oembed_html', 'custom_youtube_settings');

// -----------------------------------------------------------------------------------
//	COMMENTS
// -----------------------------------------------------------------------------------
if ( ! function_exists( 'pixels_comment' ) ) :
function pixels_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$isByAuthor = false;
    if($comment->comment_author_email == get_the_author_meta('email')) {
        $isByAuthor = true;
    }
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div class="comment-wrap clearfix">
			<div id="comment-<?php comment_ID(); ?>" class="comment-body cleafix">				
				<?php echo get_avatar( $comment, 50 ); ?>
				<div class="comment-content">
					<p class="meta">
						<cite class="fn <?php if($isByAuthor) { ?>post-author<?php } ?>"><?php comment_author_link(); ?></cite>	
						<span class="comment-date">					
						<?php printf( __( '%2$s', 'twentyeleven' ),
								sprintf( '<span class="comment-date">%s', get_comment_author_link() ), 
								sprintf( ' on <a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a></span>',
									esc_url( get_comment_link( $comment->comment_ID ) ),
									get_comment_time( 'c' ),
									/* translators: 1: date, 2: time */
									sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
								)
							);
						?>	
                        </span>
					</p>					
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>
					<?php endif; ?>				
					<?php comment_text(); ?>					
				</div><!-- /comment-content -->				
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- /reply -->			
			</div><!-- /comment-body -->
		</div><!-- /comment-wrap for double border effect -->
	
<?php	endswitch; }
endif;

?>