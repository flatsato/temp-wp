<?php get_header(); ?>
<div class="l-contents">
<main class="l-main">

<?php while(have_posts()): the_post(); ?>
<article class="entryWrap">

<h1 class="entryTitle"><?php the_title(); ?></h1>
<p class="date"><?php the_time('Y/m/d'); ?></p>
<div class="category"><?php the_category(); ?></div>
<div class="tag"><?php the_tags(); ?></div>
<div class="entryWrap"><?php the_content(); ?></div>
</article>
<?php endwhile; ?>

<div class="pageNavi">
<span class="fLeft"><?php previous_post_link('&laquo; %link', '前の情報を見る', TRUE); ?></span>
<span class="fRight"><?php next_post_link('%link &raquo;', '次の情報を見る', TRUE) ?></span>
</div>

</main>
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>