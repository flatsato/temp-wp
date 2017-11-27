<footer class="l-footer">
<nav class="l-footer__nav">
<?php wp_nav_menu(array(
  'theme_location'  => 'nav2',
)); ?>
</nav>
<p class="l-footer__copy"><small>COPYRIGHT &copy; <?php bloginfo('name'); ?> AllRIGHTS RESERVED</small></p>
</footer>
</div>
<!-- *** javascript *** --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  // jquery fallback
  if (!window.jQuery) document.write('<script src="/js/vendor/jquery-3.2.1.min.js"><\/script>')
</script>
<script src="<?php bloginfo('template_url'); ?>/js/vendor/scrollsmoothly.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
<?php wp_footer(); ?>
</body>
</html>