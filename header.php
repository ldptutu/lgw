<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../favicon.ico">
	<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
	<nav id="custom-boostrap-menu" class="navbar navbar-default navbar-static-top">
	    <div class="container">
		<?php get_template_part('template-parts/header/header','image'); ?>
		<?php if ( has_nav_menu( 'top' ) ) : ?>
		    <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
		<?php endif; ?>
	    </div>
	</nav>
	<?php if (is_front_page() && is_home()):?>
	    <?php get_template_part('template-parts/carousel/carousel','image'); ?>
	<?php endif; ?>
