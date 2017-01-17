<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<span class="screen-reader-text"><?php echo _x( '', 'label', 'telltale' ) ?></span>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'telltale' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for: ', 'label', 'telltale' ) ?>"/>
	<button type="submit" class="search-submit"><i class="fa fa-angle-double-right"></i></button>
</form>