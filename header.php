<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>
        <?php wp_title(); ?>
    </title>
    <?php wp_head(); ?>
</head>

<body>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                </div>
            </div>
        </div>
    </header>





<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--BELOW IS AN EXAMPLE USING THE BOOTSTRAP NAVWALKER MENU: wp_bootstrap_navwalker.php-->



<!--
	<header class="navbar navbar-default navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <img src="wp-content/themes/lomonaco/images/Logo.png" class="img-responsive hidden-sm hidden-md hidden-lg navbar-logo" />
                       
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
           
           
           <?php
                    if(has_nav_menu('main-menu')){
                         wp_nav_menu(array(
                            'theme_location'  => 'main-menu',
                            'container'       => false, 
                            'menu_class'      => 'nav navbar-nav', 
                            'menu_id'         => 'main-menu',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'depth'           => 0,
                            'walker'          => new wp_bootstrap_navwalker()
                         ));
                    }
				?>
           
           

        </nav>
    </div>
</header>
-->