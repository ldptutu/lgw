<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'lgw_single_post_top' );

	/**
	 * Functions hooked into lgw_single_post add_action
	 *
	 * @hooked lgw_post_header          - 10
	 * @hooked lgw_post_meta            - 20
	 * @hooked lgw_post_content         - 30
	 */
	do_action( 'lgw_single_post' );

	/**
	 * Functions hooked in to lgw_single_post_bottom action
	 *
	 * @hooked lgw_post_nav         - 10
	 * @hooked lgw_display_comments - 20
	 */
	do_action( 'lgw_single_post_bottom' );
	?>

</div><!-- #post-## -->
