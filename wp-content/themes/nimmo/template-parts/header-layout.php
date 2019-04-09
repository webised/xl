<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = nimmo_get_opt( 'sticky_on', false );
$hidden_sidebar_on = nimmo_get_opt( 'hidden_sidebar_on', false );
?>
<header id="masthead" class="header-main">
    <div id="header-wrap" class="header-layout1 <?php if($sticky_on == 1) { echo 'is-sticky'; } else { echo 'no-sticky'; } ?>">
        <div id="header-main" class="header-main">
            <div class="container">
                <div class="row">
                    <div class="header-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="header-navigation">
                        <nav class="main-navigation">
                            <div class="main-navigation-inner">
                                <div class="menu-mobile-close"><i class="zmdi zmdi-close"></i></div>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                            </div>
                        </nav>
                        <?php if($hidden_sidebar_on) : ?>
                            <div class="hidden-sidebar-icon">
                                <span class="flaticon-menu"></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="menu-mobile-overlay"></div>
                </div>
            </div>
            <div id="main-menu-mobile">
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        </div>
    </div>
</header>