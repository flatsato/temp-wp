<?php get_header(); ?>

<div class="l-contents">
<div class="l-mainContents">

<div class="section-header">
<h1 class="entryTitle"><?php single_cat_title(); ?></h1>
</div>

<?php while(have_posts()): the_post();?>
<article class="entryWrap">
<p class="date"><?php the_time('Y/m/d'); ?></p>

<div class="<?php echo $cats->category_nicename;?>">
<p class="thumb"><a href="<?php the_permalink(); ?>" <?php if ( has_post_format( 'gallery' )) echo 'class="photo"' ?> ><?php the_title(); ?></a></p>
<p class="excerpt"><?php the_excerpt(); ?></p>
</div>

</article>
<?php endwhile; ?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?> 

</div>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>