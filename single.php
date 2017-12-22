<?php
get_header(); ?>


<div class="container">

    

    <ul class="breadcrumb">

	<li><a href="#">Home</a></li>

	<li><a href="#">Products</a></li>

	<li class="active">Accessories</li>

    </ul>

    
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
</div><!-- #post-## -->
</div>
<?php get_footer(); ?>
