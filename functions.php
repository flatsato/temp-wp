<?php

//アイキャッチ画像を利用
add_theme_support( 'post-thumbnails' );
//アイキャッチ画像サイズを指定
set_post_thumbnail_size(300, 220, true);

// サイド ウィジェットエリアを定義
register_sidebar( array(
	'name' => __( 'サイド ウィジェットエリア' ),
	'id' => 'top',
	'description' => __( 'サイドバーの一番上に表示されるウィジェットエリアです' ),
	'before_widget' => '<div class="wigetWrap">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widgetTitle">',
	'after_title' => '</h3>',
) );
 
//ギャラリーのスタイルを削除
function remove_gallery_style() {
  return "<div class='gallery'>";
}
add_filter('gallery_style', 'remove_gallery_style');

//bodyにclassを追加
function add_page_root_body_class( $classes ) {
    if ( is_singular() ) {
        $post_type = get_query_var( 'post_type' );
        if ( is_page() ) {
            $post_type = 'page';
        }
        if ( $post_type && is_post_type_hierarchical( $post_type ) ) {
            global $post;
            if ( $post->ancestors ) {
                $root = $post->ancestors[count($post->ancestors) - 1];
                $root_post = get_post( $root );
                $classes[] = esc_attr( $post_type . '-category-' . $root_post->post_name );
            } else {
                $classes[] = esc_attr( $post_type . '-category-' . $post->post_name );
            }
        }
    }
    return $classes;
}
add_filter( 'body_class', 'add_page_root_body_class' );

//固定ページで抜粋を使う
add_post_type_support( 'page', 'excerpt' );

//カスタムメニューを使う
register_nav_menus( array(
    'head_navi' => 'ヘッダーナビ',
    'foot_navi' => 'フッターナビ',
));

//カテゴリ一覧にカテゴリスラッグ入りのclassを追加する
function add_cat_slug_class( $output, $args ) {
    $regex = '/<li class="cat-item cat-item-([\d]+)[^"]*">/';
    $taxonomy = isset( $args['taxonomy'] ) && taxonomy_exists( $args['taxonomy'] ) ? $args['taxonomy'] : 'category';
     
    preg_match_all( $regex, $output, $m );
     
    if ( ! empty( $m[1] ) ) {
        $replace = array();
        foreach ( $m[1] as $term_id ) {
            $term = get_term( $term_id, $taxonomy );
            if ( $term && ! is_wp_error( $term ) ) {
                $replace['/<li class="cat-item cat-item-' . $term_id . '("| )/'] = '<li class="cat-item cat-item-' . $term_id . ' cat-item-' . esc_attr( $term->slug ) . '$1';
            }
        }
        $output = preg_replace( array_keys( $replace ), $replace, $output );
    }
    return $output;
}
add_filter( 'wp_list_categories', 'add_cat_slug_class', 10, 2 );


//投稿記事のみ検索対象にする。固定ページは除く。
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','SearchFilter');

//管理画面にお問い合わせ先をつける。
function remove_footer_admin () {
  echo 'お問い合わせは<a href="http://wd-flat.com/contact/" target="_blank">web design FLAT</a>まで';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//管理画面にfaviconをつける。
function admin_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('template_url').'/images/admin-favicon.icon" />';
}
add_action('admin_head', 'admin_favicon');

//管理バーを表示しない
add_filter('show_admin_bar','__return_false');

//管理画面＞プロフィール項目を消す
function hide_profile_fields( $contactmethods ) {
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);
  unset($contactmethods['yim']);
  return $contactmethods;
}
add_filter('user_contactmethods','hide_profile_fields');

//管理画面＞プロフィール項目を追加
function my_new_contactmethods( $contactmethods ) {
/* ツイッター */
$contactmethods['twitter'] = 'Twitter';
/* facebook */
$contactmethods['facebook'] = 'Facebook';
/* Google+ */
$contactmethods['g_plus'] = 'Google+';
return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);

//管理画面＞編集者の場合、メニューを非表示
if (!current_user_can('edit_users')) {
  function remove_menus () {
    global $menu;
    $restricted = array(
      __('リンク'),
			__('コメント'),
      __('お問い合わせ'),
			__('ツール'),
    );
    end ($menu);
    while (prev($menu)){
      $value = explode(' ',$menu[key($menu)][0]);
      if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
        unset($menu[key($menu)]);
      }
    }
  }
  add_action('admin_menu', 'remove_menus');
}

//記事投稿画面＞編集者の場合、メニューを非表示
if (!current_user_can('edit_users')) {
  function remove_extra_meta_boxes() {
    remove_meta_box( 'postcustom' , 'post' , 'normal' ); /* 投稿のカスタムフィールド */
    remove_meta_box( 'postcustom' , 'page' , 'normal' ); /* 固定ページのカスタムフィールド */
    remove_meta_box( 'postexcerpt' , 'post' , 'normal' ); /* 投稿の抜粋 */
    remove_meta_box( 'postexcerpt' , 'page' , 'normal' ); /* 固定ページの抜粋 */
    remove_meta_box( 'commentsdiv' , 'post' , 'normal' ); /* 投稿のコメント */
    remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); /* 固定ページのコメント */
    remove_meta_box( 'tagsdiv-post_tag' , 'post' , 'side' ); /* 投稿のタグ */
    remove_meta_box( 'tagsdiv-post_tag' , 'page' , 'side' ); /* 固定ページのタグ */
    remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' ); /* 投稿のトラックバック */
    remove_meta_box( 'trackbacksdiv' , 'page' , 'normal' ); /* 固定ページのトラックバック */
    remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' ); /* 投稿のディスカッション */
    remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); /* ページのディスカッション */
    remove_meta_box( 'slugdiv','post','normal'); /* 投稿のスラッグ */
    remove_meta_box( 'slugdiv','page','normal'); /* 固定ページのスラッグ */
    remove_meta_box( 'authordiv','post','normal' ); /* 投稿の作成者 */
    remove_meta_box( 'authordiv','page','normal' ); /* 固定ページの作成者 */
    remove_meta_box( 'revisionsdiv','post','normal' ); /* 投稿のリビジョン */
    remove_meta_box( 'revisionsdiv','page','normal' ); /* 固定ページのリビジョン */
    remove_meta_box( 'pageparentdiv','page','side'); /* 固定ページのページ属性 */
  }
  add_action( 'admin_menu' , 'remove_extra_meta_boxes' );
}

// #more-$id を削除する。
function custom_content_more_link( $output ) {
	$output = preg_replace('/#more-[\d]+/i', '', $output );
	return $output;
}
add_filter( 'the_content_more_link', 'custom_content_more_link' );

//投稿ページ＞画像タグカスタマイズ
function my_remove_img_attr($html, $id, $alt, $title, $align, $size){
    $html = preg_replace('/ width="\d+"/', '', $html);
    $html = preg_replace('/ height="\d+"/', '', $html);
    $html = preg_replace('/ title=".+"/', '', $html);
return $html;
}

add_action( 'get_image_tag', 'my_remove_img_attr', 1 ,6);

//投稿ページ＞画像タグ内の閉じタグを削除

function my_image_send_to_editor( $html, $id, $caption, $title, $align, $url, $size ) {

  $html = preg_replace('/<a href=".+">/', '', $html);
  $html = preg_replace('/<\/a>/', '', $html);
  $html = '<div class="photo">' .$html .'</div>';

return $html;
}

add_action( 'image_send_to_editor', 'my_image_send_to_editor', 10 ,7);

//headコードを削除＜<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://example.com/xmlrpc.php?rsd" />
remove_action('wp_head', 'rsd_link');

//headコードを削除＜<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://example.com/wp-includes/wlwmanifest.xml" />
remove_action('wp_head', 'wlwmanifest_link');

//headコードを削除＜Wordpressバージョンを削除
remove_action('wp_head', 'wp_generator');

//Post Relational Links
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');


//カスタム投稿タイプの指定
function new_post_type(){
	//カスタム投稿タイプ1
	register_post_type(
		'custom1',
		array(
			  'label'=> 'カスタム投稿1',
			  'public' => true,
			  'hierarchical'=> false, 
			  'has_archive' => true,
			  'supports' => array(
						 'title',
						 'editor',
						 'thumbnail',
						 'excerpt'
			  ),
			  'menu_position' => 5
		)
	);
	
	    // カスタム投稿タイプ1タクソノミー
    register_taxonomy(
        'custom1cat',
        'custom1',
        array(
          'label' => 'カスタム投稿1カテゴリー',
          'public' => true,
          'hierarchical' => true,
        )
    );
		
}
add_action('init', 'new_post_type');

 ?>