<?php
vc_map(
    array(
        'name'     => esc_html__('Portfolio Grid', 'nimmo'),
        'base'     => 'ct_portfolio_grid',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Portfolio Displayed', 'nimmo' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'nimmo'),
        'params'   => array(

            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Portfolio Lists', 'nimmo' ),
                'param_name' => 'ct_portfolio_list',
                'value' => '',
                'params' => array(
                    /* Title */
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Title', 'nimmo'),
                        'param_name' => 'title',
                        'description' => 'Enter title.',
                        'admin_label' => true,
                    ),

                    /* Description */
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Description', 'nimmo'),
                        'param_name' => 'description',
                        'description' => 'Enter description.',
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

            array(
                'type' => 'textfield',
                'heading' => __( 'Image size', 'nimmo' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height). Enter multiple sizes (Example: 100x100,200x200,300x300)).', 'nimmo' ),
                'group'      => esc_html__('Grid Settings', 'nimmo'),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Layout Type', 'nimmo'),
                'param_name' => 'layout',
                'value'      => array(
                    'Basic'   => 'basic',
                    'Masonry' => 'masonry',
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Item Gap', 'nimmo'),
                'param_name' => 'gap',
                'value'      => '',
                'group'      => esc_html__('Grid Settings', 'nimmo'),
                'description' => esc_html__('Select gap between grid elements. Enter number only', 'nimmo'),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Filter on Masonry', 'nimmo'),
                'param_name' => 'filter',
                'value'      => array(
                    'Enable'  => 'true',
                    'Disable' => 'false'
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Pagination Type', 'nimmo'),
                'param_name' => 'pagination_type',
                'value'      => array(
                    'Loadmore' => 'loadmore',
                    'Pagination'  => 'pagination',
                    'Disable' => 'false',
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Default Title', 'nimmo'),
                'param_name' => 'filter_default_title',
                'value'      => 'All',
                'group'      => esc_html__('Filter', 'nimmo'),
                'description' => esc_html__('Enter default title for filter option display, empty: All', 'nimmo'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Alignment', 'nimmo'),
                'param_name' => 'filter_alignment',
                'value'      => array(
                    'Center'   => 'center',
                    'Left'   => 'left',
                    'Right'   => 'right',
                ),
                'description' => esc_html__('Select filter alignment.', 'nimmo'),
                'group'      => esc_html__('Filter', 'nimmo'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),

            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XS', 'nimmo'),
                'param_name'       => 'col_xs',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 1,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns SM', 'nimmo'),
                'param_name'       => 'col_sm',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 1,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns MD', 'nimmo'),
                'param_name'       => 'col_md',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 3,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns LG', 'nimmo'),
                'param_name'       => 'col_lg',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XL', 'nimmo'),
                'param_name'       => 'col_xl',
                'edit_field_class' => 'ct_col_5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Custom Column Item', 'nimmo'),
                'param_name'       => 'custom_column',
                'value'      => array(
                    'False'   => 'false',
                    'True' => 'true',
                ),
                'std'              => false,
                'group'            => esc_html__('Grid Settings', 'nimmo'),
            ),
            array(
            'type' => 'param_group',
                'heading' => esc_html__( 'List Item', 'nimmo' ),
                'param_name' => 'cms_list_column',
                'description' => esc_html__( 'Column for each item', 'nimmo' ),
                'value' => '',
                'params' => array(
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns XS', 'nimmo'),
                        'param_name'       => 'custom_col_xs',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 1,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns SM', 'nimmo'),
                        'param_name'       => 'custom_col_sm',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 2,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns MD', 'nimmo'),
                        'param_name'       => 'custom_col_md',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 3,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns LG', 'nimmo'),
                        'param_name'       => 'custom_col_lg',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 4,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns XL', 'nimmo'),
                        'param_name'       => 'custom_col_xl',
                        'edit_field_class' => 'ct_col_5 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 4,
                        'group'            => esc_html__('Grid Settings', 'nimmo'),
                        'admin_label' => true,
                    ),
                ),
                'dependency' => array(
                    'element' => 'custom_column',
                    'value'   => 'true'
                ),
                'group'            => esc_html__('Grid Settings', 'nimmo'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'nimmo' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'nimmo' ),
                'group'            => esc_html__('Grid Settings', 'nimmo')
            ),
        )
    )
);

class WPBakeryShortCode_ct_portfolio_grid extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>