<?php get_header(); ?>
<div class="l-contents">
<main class="l-main">
<?php while(have_posts()): the_post(); ?>
<article class="entryWrap">
<h1 class="title"><?php the_title(); ?></h1>
<time class="date"><?php the_time('Y/m/d'); ?></time>
<div class="thumb"><?php the_post_thumbnail('thumbnail'); ?></div>
<p class="excerpt"><?php the_excerpt(); ?></p>
<div class="entry"><?php the_content(); ?></div>
</article>
<?php endwhile; ?>
</main>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
