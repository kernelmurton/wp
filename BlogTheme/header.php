<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="<?php bloginfo('cherset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/GeneralStyle.css">
    <title><?php titles(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <div class="header-bar">
            <a href="<?php echo home_url() ?>" class="site-img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page_name.png" alt="header image">
            </a>
            <div class="menu">
                <button>menu</button>
            </div>
        </div>

        <nav class="nav">
            <ul>
                <li><a href="<?php echo home_url() ?>">TOP</a></li>
                <li><a href="#main">カテゴリー</a></li>
                <li><a href="#info">お問い合わせ</a></li>
            </ul>
        </nav>
    </header>