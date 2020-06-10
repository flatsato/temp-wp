<?php
/*
Template Name: hoge
*/
?>

<?php get_header(); ?>
<div class="l-contents">
<main class="l-main">
<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<article class="entryWrap">
<time class="date"><?php the_time('Y/m/d'); ?></time>
<div class="category"><?php the_category(); ?></div>
<div class="tag"><?php the_tags(); ?></div>
<div class="thumb"><?php the_post_thumbnail('thumbnail'); ?></div>
<p class="excerpt"><?php the_excerpt(); ?></p>
</article>
</main>
</div>

<?php get_footer(); ?>