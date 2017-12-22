<?php
/**
   Display header site branding
 */
?>
<div class="site-title">
    <a  href="<?php echo esc_url(home_url('/')); ?>">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" width="145" height="32" />
    </a>
    <p class="site-name"><?php bloginfo('name'); ?></p>
</div>

<div class="search-pannel">
    <p ><?php bloginfo('name'); ?></p>    
</div>




