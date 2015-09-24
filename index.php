<?php get_header(); ?>

<div class="l-contents ">
<div class="l-mainContents">

<?php while(have_posts()): the_post();?>
<article class="entryWrap">

<p class="date"><?php the_time('Y/m/d'); ?></p>

<div class="<?php echo $cats->category_nicename;?>">
<p class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></p>
<h2 class="entryTitle"><?php the_title(); ?></h2>
<p class="excerpt"><?php the_excerpt(); ?></p>
</div>

</article>
<?php endwhile; ?>

</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>