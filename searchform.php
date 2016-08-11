<form id="search-form" class="searchform" action="<?php bloginfo('url'); ?>/" method="get" >
	<input type="text" name="s" class="s" value="<?php _e('Search') ?>" onfocus="if(this.value=='<?php _e('Search') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Search') ?>';" />
	
	<button type="submit" id="head-search-sub"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
</form>  
