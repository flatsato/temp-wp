<?php get_header(); ?>

<div class="l-contents">
<div class="l-mainContents">

<?php while(have_posts()): the_post(); ?>
<article class="entryWrap">

<h1 class="entryTitle"><?php the_title(); ?></h1>

<p class="date"><?php the_time('Y/m/d'); ?></p>
<div class="entryWrap"><?php the_content(); ?></div>
<p class="tagsList"><?php the_tags(); ?></p>

</article>
<?php endwhile; ?>

<div class="pageNavi">
<span class="fLeft"><?php previous_post_link('&laquo; %link', '前の情報を見る', TRUE); ?></span>
<span class="fRight"><?php next_post_link('%link &raquo;', '次の情報を見る', TRUE) ?></span>
</div>

</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>