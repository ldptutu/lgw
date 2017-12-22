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
                                jQuery(this).click(function(){
                                    alert('here');
                                    jQuery('#ex1 img')[0].src=l_url_img;
                                });
                            });
                        }());
             </script>
</body>
</html>
