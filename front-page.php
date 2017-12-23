<?php
get_header();
?>
<div class="container">
    <?php  if (has_nav_menu('front_page_menu_rmd')){
	if (($locations = get_nav_menu_locations()) && isset($locations['front_page_menu_rmd'])) {
	    $menu = get_term($locations['front_page_menu_rmd'],'nav_menu');
	    $menu_items = wp_get_nav_menu_items($menu->term_id);
            
	    foreach($menu_items as $menu_item) {
		if ($menu_item-> menu_item_parent == 0) {
                    $parent_id = $menu_item->ID;
                    $object_id = $menu_item->object_id;
                    $category_ids[]  = $object_id;
                    foreach ($menu_items as $sub_item){
			if ($sub_item->menu_item_parent == $parent_id){
                            $category_ids[]= $sub_item->object_id;
			}
                    }
                    
                    $comma_args = implode(",",$category_ids);
                    $args = 'posts_per_page=-1&cat=' . $comma_args;
                    if ($posts = new WP_Query($args)) { ?>
        <h2>
	    <?php echo $menu_item->title; ?>
        </h2>
        <div class="row">
	    <?php while ($posts->have_posts() ):$posts->the_post();
	    ?>
		<?php if ($flag == true) :?>
		    <div class="col-md-4">
		<?php else: ?>
			<div class="col-md-3">
		<?php endif; ?>
		
		<?php	$attachments = new Attachments( 'my_attachments',get_the_id());
		if ($attachments->exist()) {?>
		    <?php $my_index = 0; ?>
		    <?php if( $attachment = $attachments->get_single( $my_index )) { ?>
			<a href="<?php the_permalink(); ?>" class="no_border">
			    <?php if($flag == true): ?>
				<img src="<?php echo wp_get_attachment_image_src($attachment->id,array(450,600))[0]; ?>"  width="100%" heigth="auto"/>
			    <?php else : ?>
			<img src="<?php echo wp_get_attachment_image_src($attachment->id,array(450,600)[0]; ?>"  width="100%" heigth="auto"/>								 <?php endif; ?>
			</a>
		    <?php }
		    if ($flag == false){
			$flag = true;
		    }
		    } ?>
		</div>
	    <?php
	    endwhile;
	    unset($attachments);
	    unset($category_ids);
       	    wp_reset_postdata(); ?>
	</div>
		    <?php }}}}}    get_footer();
