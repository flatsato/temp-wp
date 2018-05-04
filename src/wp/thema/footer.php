<footer class="l-footer">
<p class="l-footer__copy"><small>COPYRIGHT &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> AllRIGHTS RESERVED</small></p>
</footer>
</div>
<!-- *** javascript *** --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  // jquery fallback
  if (!window.jQuery) document.write('<script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery-3.2.1.min.js"><\/script>')
</script>
<script src="<?php bloginfo('template_url'); ?>/js/vendor/scrollsmoothly.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
<?php wp_footer(); ?>
</body>
</html>