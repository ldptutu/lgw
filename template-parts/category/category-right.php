
<?php if ( have_posts() ) : ?>
    <header class="page-header">
                 <?php
	 the_archive_title( '<h1 class="page-title">', '</h1>' );
	 the_archive_description( '<div class="taxonomy-description">', '</div>' );
	 ?>
    </header><!-- .page-header -->
<?php get_template_part( 'loop' );
else :
get_template_part( 'content', 'none' );

endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

