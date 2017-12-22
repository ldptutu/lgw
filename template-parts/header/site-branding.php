<?php
/**
   Display header site branding
 */
?>
<a class="navbar-left"  href="<?php echo esc_url(home_url('/')); ?>" style="padding-left:15px;">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" width="145" height="32" />
</a>
<span class="navbar-left"><?php blog_info('name'); ?></span>




