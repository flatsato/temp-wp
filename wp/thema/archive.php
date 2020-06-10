<?php get_header(); ?>
<div class="l-contents">
<main class="l-main">
<h1 class="entryTitle"><?php single_cat_title(); ?></h1>

<?php if ( have_posts() ) : ?>
<ul class="p-entrylist">
<?php while ( have_posts() ) : ?>
<?php the_post(); ?>
<li>
<time class="date"><?php the_time('Y/m/d'); ?></time>
<div class="category"><?php the_category(); ?></div>
<div class="tag"><?php the_tags(); ?></div>
<div class="thumb"><?php the_post_thumbnail('thumbnail'); ?></div>
<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<p class="excerpt"><?php the_excerpt(); ?></p>
</li>
<?php endwhile; ?>
</ul>
<?php else : ?>
<p>投稿がありません。</p>
<?php endif; ?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?> 
</main>
</div>

<?php get_footer(); ?>