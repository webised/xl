<?php
/**
 * Template part for displaying site branding
 */

$logo = nimmo_get_opt( 'logo', array( 'url' => '', 'id' => '' ) );
$logo_url = $logo['url'];

$custom_header = nimmo_get_page_opt( 'custom_header', false );
$logo_page = nimmo_get_page_opt( 'logo' );
if($custom_header && !empty($logo_page['url'])) {
    $logo_url = $logo_page['url'];
}

$logo_dark = nimmo_get_opt( 'logo_dark', array( 'url' => '', 'id' => '' ) );
$logo_dark_url = $logo_dark['url'];

$logo_sticky = nimmo_get_opt( 'logo_sticky', array( 'url' => '', 'id' => '' ) );
$logo_sticky_url = $logo_sticky['url'];

$logo_mobile = nimmo_get_opt( 'logo_mobile', array( 'url' => '', 'id' => '' ) );
$logo_mobile_url = $logo_mobile['url'];

if ($logo_url || $logo_sticky_url || $logo_mobile_url || $logo_dark_url)
{
    if ( is_front_page() && is_home() ) {
        printf('<h1 class="site-title" style="display: none;">%1$s</h1>', esc_attr( get_bloginfo( 'name' ) ));
    }
    printf(
        '<a class="logo-light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_url )
    );
    printf(
        '<a class="logo-dark" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_dark_url )
    );
    printf(
        '<a class="logo-sticky" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_sticky_url )
    );
    printf(
        '<a class="logo-mobile" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_mobile_url )
    );
    if ( is_front_page() && is_home() ) {
        printf('</h1>');
    }
}
else
{
    printf(
        '<a class="logo-light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="'.esc_attr__('Logo', 'nimmo').'"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( get_template_directory_uri().'/assets/images/logo-sticky.png' )
    );
}