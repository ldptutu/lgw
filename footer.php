<?php
?>


<script>
  if ($ && $.fn.zoom) {
    $('#ex1').zoom();
  }
</script>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="wrap">
	<?php
	get_template_part( 'template-parts/footer/site', 'info' );
	?>
    </div><!-- .wrap -->
</footer><!-- #colophon -->
<?php wp_footer() ?>
</body>
</html>
