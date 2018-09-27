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
<?php
  function get_parent_slug() {
    global $post;
    if (is_page() && $post->post_parent) {
      $post_data = get_post($post->post_parent);
      return $post_data->post_name;
    }
  }
  if ( is_front_page() ) {
    $body_id = 'home';
  } else if ( is_single()) {
    $body_id = 'singlePage';
  } else if ( is_page( array('greeting', 'vision', 'profile') ) ) {
    $body_id = 'companyPage';
  } else if ( is_page('service') ) {
    $body_id = 'servicePage';
  } else if ( is_page('recruit') ) {
    $body_id = 'recruitPage';
  } else if ( is_page('culture') ) {
    $body_id = 'culturePage';
  } else if ( is_page('contact') || get_parent_slug() === 'contact' ) { 
    $body_id = 'contactPage';
  } else if ( is_page() ) {
    $body_id = ''.$post->post_name.'Page';
  } else if ( is_category() ) {
    $category = get_the_category();
    $body_id = 'cat_'.$category[0]->category_nicename.'Page';
  }
   ?>
  
<body id="<?php echo esc_attr( $post->post_name ); ?>">



