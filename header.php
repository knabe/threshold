<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <title><?php wp_title( '|', true, 'right' ) ?></title>

    <?php wp_head() ?>

    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>

<?php
    $body_class = is_front_page() ? 'homepage' : 'not-homepage';
?>

<body <?php body_class( $body_class ) ?>>
    <!-- Header -->
    <div id="header">
        <div class="container">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="<?php echo home_url() ?>"><?php echo get_bloginfo('name') ?></a></h1>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'container' => '' ) ); ?>
            </nav>
        </div>
    </div>
    <div class="wrapper">
