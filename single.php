<?php
get_header(); ?>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-9">
	<?php if ( have_posts() ) : ?>
	    <header class="page-header">
		<?php  the_archive_title( '<h1 class="page-title">', '</h1>' );		?>
	    </header>
	    <?php echo "abc"; ?>
	    <?php while ( have_posts() ) : the_post();
	    //	    do_action( 'storefront_page_before' );
	    get_template_part( 'content', 'single' );
	    //	    do_action( 'storefront_page_after' );
	    endwhile; // End of the loop.
	    else :
            //	get_template_part( 'content', 'none' );
            endif; ?>
    </div>
    
    <div class="col-xs-6 col-md-3">
	<?php get_template_part( 'template-parts/navigation/navigation', 'left' ); ?>
    </div>
</div>
<?php get_footer(); ?>
