<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
<title><?php wp_title('｜', true, 'right'); ?><?php bloginfo('name'); ?></title>

<meta name="keywords" content=""> 
<meta name="description" content=""> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- *** Wordpress *** --> 
<link rel="alternate" type="application/rss+xml" title="RSS FEED" href="<?php bloginfo('rss2_url'); ?>">

<!-- *** favicon、webclip *** ★忘れずに指定 https://realfavicongenerator.net/ -->
<link rel="apple-touch-icon" href="/img/head/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/head/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/head/favicon-16x16.png">
<link rel="manifest" href="/img/head/site.webmanifest">
<link rel="mask-icon" href="/img/head/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<link rel="icon" href="/img/head/favicon.ico">

<!-- *** stylesheet *** --> 
<link href="css/vendor/ress.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<?php wp_head(); ?>

<!-- ★ GoogleAnalytics --> 

</head>



