<?php
$args = array(
    'name' => 'Testimonial Carousel',
    'base' => 'ct_testimonial_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Testimonial Displayed', 'nimmo' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
    'params' => array(
        
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'nimmo' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
            'group'            => esc_html__('Template', 'nimmo')
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'nimmo' ),
            'value' => '',
            'param_name' => 'testimonial_item',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'nimmo'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Position', 'nimmo'),
                    'param_name' => 'position',

                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'nimmo'),
                    'param_name' => 'content',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'nimmo' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'nimmo' ),
                ),
            ),
        ),
    ));

$args = nimmo_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_testimonial_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>