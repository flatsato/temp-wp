<?php

//画像 サイズを指定
add_image_size( 'newsdetail_img', 990, 600, true );
add_image_size( 'newslist_img', 300, 200, true );

// サイド ウィジェットエリアを定義
register_sidebar( array(
	'name' => __( 'サイド ウィジェットエリア' ),
	'id' => 'top',
	'description' => __( 'サイドバーに表示されるウィジェットエリアです' ),
	'before_widget' => '<div class="wigetWrap">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widgetTitle">',
	'after_title' => '</h3>',
) );
 
//固定ページで抜粋を使う
add_post_type_support( 'page', 'excerpt' );

//カスタムメニューを使う
register_nav_menus( array(
    'navi1' => 'ヘッダーナビ',
    'navi2' => 'フッターナビ',
));

//投稿記事のみ検索対象にする。固定ページは除く。
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','SearchFilter');


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

// #more-$id を削除する。
function custom_content_more_link( $output ) {
  $output = preg_replace('/#more-[\d]+/i', '', $output );
  return $output;
}
add_filter( 'the_content_more_link', 'custom_content_more_link' );


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
//カスタムタクソノミー、タグタイプ
register_taxonomy(
  'custom1tag', 
  'custom1', 
    array(

    'label' => 'カスタム投稿1タグ',
    'public' => true,
    'hierarchical' => true,
    )
);
		
}
add_action('init', 'new_post_type');

//Twitterカード

function my_meta_ogp() {
  if( is_front_page() || is_home() || is_singular() ){
    global $post;
    $ogp_title = '';
    $ogp_descr = '';
    $ogp_url = '';
    $ogp_img = '';
    $insert = '';

    if( is_singular() ) { //記事＆固定ページ
       setup_postdata($post);
       $ogp_title = $post->post_title;
       $ogp_descr = mb_substr(get_the_excerpt(), 0, 100);
       $ogp_url = get_permalink();
       wp_reset_postdata();
    } elseif ( is_front_page() || is_home() ) { //トップページ
       $ogp_title = get_bloginfo('name');
       $ogp_descr = get_bloginfo('description');
       $ogp_url = home_url();
    }

    //og:type
    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    //og:image
    if ( is_singular() && has_post_thumbnail() ) {
       $ps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
       $ogp_img = $ps_thumb[0];
    } else {
     $ogp_img = ''.esc_attr(get_bloginfo('url')).'/img/ogp.jpg';
    }

    //出力するOGPタグをまとめる
    $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'｜'.esc_attr(get_bloginfo('name')).'">' . "\n";
    $insert .= '<meta property="og:description" content="'.esc_attr($ogp_descr).'">' . "\n";
    $insert .= '<meta property="og:type" content="'.$ogp_type.'">' . "\n";
    $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'">' . "\n";
    $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'">' . "\n";
    $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";
    $insert .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
    $insert .= '<meta name="twitter:site" content="weddingpark">' . "\n";
    $insert .= '<meta property="og:locale" content="ja_JP">' . "\n";
    //facebookのapp_id（設定する場合）
    $insert .= '<meta property="fb:app_id" content="ここにappIDを入力">' . "\n";
    //app_idを設定しない場合ここまで消す
    echo $insert;
  }
} //END my_meta_ogp

add_action('wp_head','my_meta_ogp');//headにOGPを出力

 ?>