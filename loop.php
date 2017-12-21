<?php

//do_action( 'storefront_loop_before' );
$temp = $wp_query;
$paged = (get_query_var( 'paged') != null) ? get_query_var('paged') : 1;
$wp_query = new WP_Query('posts_per_page=5&paged='.$paged);
while($wp_query->have_posts()):$wp_query->the_post();
?>
<a href=""> <?php the_ID(); ?></a>
<?php endwhile;

$wp_query =  null;
$wp_query = $temp;

lgw_paging_nav();
//do_action( 'storefront_loop_after' );

