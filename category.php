<?php
get_header();
?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3">
	<?php if ( have_posts() ) : ?>
	    <header class="page-header">
		<?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
	    </header><!-- .page-header -->
	    
	<?php get_template_part( 'loop' );

	else :
	//	get_template_part( 'content', 'none' );
	endif; ?>
    </div>
    <div class="col-xs-6 col-md-9">
	<?php get_template_part( 'template-parts/navigation/navigation', 'left' ); ?>
    </div>
</div>

<?php
get_footer()

