<?php
?>


<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="wrap">
	<?php
	get_template_part( 'template-parts/footer/site', 'info' );
	?>
    </div><!-- .wrap -->
</footer><!-- #colophon -->
<?php wp_footer() ?>
        	<script type="text/javascript">
                        (function() {
                            jQuery('#ex1').zoom();
                            jQuery('#ex1_li img').each(function(){
                                var l_url_img = this.src;
                                jQuery('#ex1').trigger('zoom.desctroy');
                                l_url_img = l_url_img.replace(/-100x100/g, "");
                                jQuery(this).click(function(){
                                    jQuery('#ex1 img')[0].src=l_url_img;
                                    jQuery('#ex1').zoom();
                                });
                            });
                        }());
             </script>
</body>
</html>
