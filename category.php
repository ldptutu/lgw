<?php
get_header();
?>

<div class="container">
    <div class="breadcrumb breadcrumbs" typeof="BreadcrumbList" >>
	<?php if(function_exists('bcn_display')) {
	    bcn_display();
	}?>
    </div>
    <div class="row">
	<div class="col-xs-12 col-sm-6 col-md-9">
	    <?php if ( have_posts() ) : ?>
		<header class="page-header" style="border-bottom:0">
		    <h1 class="page-title"><?php <the_category_title()?></h1>
		</header><!-- .page-header -->
		
	    <?php get_template_part( 'loop' );

	    else :
	    //	get_template_part( 'content', 'none' );
	    endif; ?>
	</div>
	<div class="col-xs-6 col-md-3">
	    <?php get_template_part( 'template-parts/navigation/navigation', 'left' ); ?>
	</div>
    </div>

</div>
<?php
get_footer();

