<title>
<?php if(is_home()): ?>
//トップページのタイトル
<title>株式会社ウエディングパーク<?php wp_title('｜', true, 'left'); ?><?php bloginfo('name'); ?>
</title>
<?php elseif(is_page()): ?>
//固定ページのタイトル

<?php elseif(is_single()): ?>
//投稿ページのタイトル

<?php elseif(is_category()): ?>
//カテゴリーページのタイトル

<?php elseif(is_month()): ?>
//月別ページのタイトル

<?php elseif(is_year()): ?>
//年別ページのタイトル

<?php elseif(is_search()): ?>
//検索結果ページのタイトル

<?php else: ?>
//それ以外のページのタイトル

<?php endif; ?>
</title>