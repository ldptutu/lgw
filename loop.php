<?php
//do_action( 'storefront_loop_before' );

$temp = $wp_query;
$paged = (get_query_var( 'paged') != null) ? get_query_var('paged') : 1;
$wp_query = new WP_Query('posts_per_page=5&paged='.$paged);
while($wp_query->have_posts()):$wp_query->the_post();
?>
	<?php
$attachments = new Attachments( 'my_attachments',get_the_id());
if ($attachments->exist()) {?>
		    <?php $my_index = 0; ?>
		    <?php if( $attachment = $attachments->get_single( $my_index ) ) { ?>
        <a href="<?php the_permalink(); ?>" class="no_border">
        <img src="<?php echo wp_get_attachment_image_src($attachment->id)[0]; ?>" />
        </a>
		<?php }
		} ?>

<?php endwhile;
$wp_query =  null;
$wp_query = $temp;
lgw_paging_nav();

//do_action( 'storefront_loop_after' );

