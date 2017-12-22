<?php
get_header(); ?>
<div class="row">

	<?php if ( have_posts() ) : ?>
	    <?php while ( have_posts() ) : the_post();
	    //	    do_action( 'storefront_page_before' );
	    get_template_part( 'content', 'single' );
	    //	    do_action( 'storefront_page_after' );
	    endwhile; // End of the loop.
	    else :
            //	get_template_part( 'content', 'none' );
            endif; ?>
	    
    <div class="col-md-4">
	<?php get_template_part( 'template-parts/navigation/navigation', 'left' ); ?>
    </div>
</div>
<?php get_footer(); ?>
