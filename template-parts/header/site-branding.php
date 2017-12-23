<?php
/**
   Display header site branding
 */
?>
<div class="site-title">
    <a  href="<?php echo esc_url(home_url('/')); ?>">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" width="145" height="32" />
    </a>
    <a class="site-name"><?php bloginfo('name'); ?></a>
</div>


<div class="site-search">
    <div class="widget woocommerce widget_product_search">
	<form role="search" method="get" class="woocommerce-product-search" action="https://demo.woothemes.com/storefront/">
	<label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
	<input id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products…" value="" name="s" type="search">
	<input value="Search" class=".search-button-css" type="submit">
	<input name="post_type" value="product" type="hidden">
    </form>
    </div>
</div>






