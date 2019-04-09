<?php
extract(shortcode_atts(array(
    'video_bg_image' => '',
    'video_link' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$html_id = cmsHtmlID('ct-video');
$image_url = '';
if (!empty($atts['video_bg_image'])) {
    $attachment_image = wp_get_attachment_image_src($atts['video_bg_image'], 'full');
    $image_url = $attachment_image[0];
}
$link = vc_build_link($video_link);
$a_href = 'https://www.youtube.com/watch?v=SF4aHwxHtZ0';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp ); ?>

<div id="<?php echo esc_attr($html_id);?>" class="ct-video-wrapper <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>">
    <div class="ct-video-inner">
        <a class="ct-video-button" href="<?php echo esc_url($a_href);?>">
            <i class="fa fa-play"></i>
        </a>
    </div>
</div>