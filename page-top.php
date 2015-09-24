<?php
/*
Template Name: hoge
*/
?>

<?php get_header(); ?>

<div class="l-contents">
<div class="l-mainContents">

<?php while(have_posts()): the_post();?>
<article class="entryWrap">

<p class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></p>
<h2 class="entryTitle"><?php the_title(); ?></h2>
<p class="excerpt"><?php the_excerpt(); ?></p>

</article>
<?php endwhile; ?>

</div>
</div>

<?php get_footer(); ?>