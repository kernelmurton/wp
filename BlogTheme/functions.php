<?php
//thumbnail(eyecatch img)
add_theme_support('post-thumbnails');
add_image_size('post-thumbnails', 600, 300, true);
add_image_size('thumbnail-small', 300, 150, true);


function titles()
{
    $title = wp_title(' |  ', true, 'right');
    if (is_home()) {
        //top page
        echo 'SurijaBlog | 仕事に役立つ便利なブログ';
    } else {
        // the other
        echo $title . 'SurijaBlog';
    }
};

// phpファイルをcssファイルとして読み込む
function add_phpcss()
{

    $data = array(
        'class' => 'press',
        'url' => get_bloginfo('template_url'),
        'color' => '#F00',
        'charset' => get_bloginfo('charset'),
    );
    echo '<link rel="stylesheet" href="' . get_bloginfo('stylesheet_directory') . '/css/GeneralStyle.php?' . http_build_query($data) . '" type="text/css" />';
}
add_action('wp_head', 'add_phpcss');

function control_style()
{
    if (is_home()) {
        wp_enqueue_style('home', get_template_directory_uri() . '/css/home.css');
    } elseif (is_page()) {
        wp_enqueue_style('page', get_template_directory_uri() . '/css/page.css');
    } elseif (is_category()) {
        wp_enqueue_style('category', get_template_directory_uri() . '/css/category.css');
    }
}
add_action('wp_enqueue_scripts', 'control_style');

// 人気の記事を表示
function update_custom_meta_views()
{
    global $post;
    if ('publish' === get_post_status($post) && is_single()) {
        $views = intval(get_post_meta($post->ID, '_custom_meta_views', true));
        update_post_meta($post->ID, '_custom_meta_views', ($views + 1));
    }
}
add_action('wp_head', 'update_custom_meta_views');

function add_column_custom_meta_views($columns)
{
    $columns['views'] = 'Views';
    return $columns;
}
add_filter('manage_posts_columns', 'add_column_custom_meta_views');

function add_column_custom_meta_views_content($column_name, $post_id)
{
    $views = intval(get_post_meta($post_id, '_custom_meta_views', true));
    echo $views;
}
add_action('manage_posts_custom_column', 'add_column_custom_meta_views_content', 10, 2);

function sortable_column_custom_meta_views($columns)
{
    $columns['views'] = 'Views';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'sortable_column_custom_meta_views');

function custom_orderby_custom_meta_views($vars)
{
    if (isset($vars['orderby']) && 'Views' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'meta_key' => '_custom_meta_views',
            'orderby' => 'meta_value_num'
        ));
    }
    return $vars;
}
add_filter('request', 'custom_orderby_custom_meta_views');
