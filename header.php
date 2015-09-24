<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
<title><?php wp_title('｜', true, 'right'); ?><?php bloginfo('name'); ?></title>

<meta name="keywords" content=""> 
<meta name="description" content=""> 
<meta name="viewport" content="width=device-width; initial-scale=1.0;"> 

<!-- *** webclip *** --> <!--★スマホサイト 144px-->
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/img/favicon/webclip.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/img/favicon/webclip.png">
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/img/favicon/webclip.png">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon/webclip.png">
<link rel="icon" href="<?php bloginfo('template_url'); ?>/img/favicon/webclip.png">

<!-- *** Favicon *** --> <!--★faviconあると最高 64px-->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon/favicon.ico"> 

<!-- *** Wordpress *** --> 
<link rel="alternate" type="application/rss+xml" title="RSS FEED" href="<?php bloginfo('rss2_url'); ?>" />

<!-- *** Facebook *** --> 
<meta property="og:type" content="website">
<meta property="og:site_name" content="">
<meta property="og:description" content="">
<meta property="og:image" content="http/images/ogp.jpg"><!--★OGPを忘れずに-->
<meta property="og:url" content="">
<meta property="og:locale" content="ja_JP">

<!-- *** stylesheet *** --> 
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"><!--★ font icon CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" rel="stylesheet">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sanitize.css/2.0.0/sanitize.css"> ★PC・SPリセット CSS--->
<!--<link rel="stylesheet" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css"> ★リセットCSS-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<!-- *** javascript *** --> 
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> <!--★IE9〜 supported-->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script><!--★IE8〜 supported-->

<script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery.matchHeight-min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/vendor/scrollsmoothly.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>

<!-- ★ GoogleAnalytics --> 

</head>

<body <?php body_class(); ?>>

<header id="pagetop" class="l-globalHeader">
<div class="c-siteInner">
<h1 class="sitelogo"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo('name'); ?></a></h1>
<p><?php bloginfo('description'); ?></p>
<nav class="l-globalNav">
<?php wp_nav_menu(array('theme_location'  => 'head_navi',)); ?>
</nav>
</div>
</header>

<div class="l-container">