<?php
$footer_copyright = nimmo_get_opt('footer_copyright');
$social_label = nimmo_get_opt('social_label');
$back_totop_on = nimmo_get_opt('back_totop_on', true);
?>
<footer id="colophon" class="site-footer footer-layout1">
    <?php if ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <?php nimmo_footer_top(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="bottom-copyright">
                    <?php if ($footer_copyright) {
                        echo wp_kses_post($footer_copyright);
                    } else {
                        echo wp_kses_post(''.esc_attr(date("Y")).' &copy; All rights reserved by <a target="_blank" href="https://themeforest.net/user/casethemes">CaseThemes</a>');
                    } ?>
                </div>
                <div class="bottom-social">
                    <?php if(!empty($social_label)) : ?>
                        <label><?php echo esc_attr($social_label); ?></label>
                    <?php endif; ?>
                    <?php nimmo_footer_social_icon(); ?>
                </div>
            </div>
        </div>
    </div>
</footer>