<?php
class Elementor_Page_Title_Header extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'responsive_header';
    }

    public function get_title()
    {
        return esc_html__('Page Header & Title', 'rlm-widgets');
    }

    public function get_icon()
    {
        return 'eicon-image-bold';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['header', 'title', 'rlm'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Info', 'rlm-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Title
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Page Title', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        // Background image
        $this->add_control(
            'background_image',
            [
                'label' => esc_html__('Background Image', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Background image size
        $this->add_control(
            'background_image_size',
            [
                'label' => esc_html__('Background Image Size', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'cover' => esc_html__('Cover', 'rlm-widgets'),
                    'contain' => esc_html__('Contain', 'rlm-widgets'),
                    'auto' => esc_html__('Auto', 'rlm-widgets'),
                ],
                'default' => 'cover',
            ]
        );


        // Background image position
        $this->add_control(
            'background_image_position',
            [
                'label' => esc_html__('Background Image Position', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'center center' => esc_html__('Center Center', 'rlm-widgets'),
                    'center left' => esc_html__('Center Left', 'rlm-widgets'),
                    'center right' => esc_html__('Center Right', 'rlm-widgets'),
                    'top center' => esc_html__('Top Center', 'rlm-widgets'),
                    'top left' => esc_html__('Top Left', 'rlm-widgets'),
                    'top right' => esc_html__('Top Right', 'rlm-widgets'),
                    'bottom center' => esc_html__('Bottom Center', 'rlm-widgets'),
                    'bottom left' => esc_html__('Bottom Left', 'rlm-widgets'),
                    'bottom right' => esc_html__('Bottom Right', 'rlm-widgets'),
                ],
                'default' => 'center center',
            ]
        );

        $this->end_controls_section();

        // Content Tab End


        // Style Tab Start

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Options', 'rlm-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Title Color
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-widget-text' => 'color: {{VALUE}};',
                ],
                'default' => 'white',
            ]
        );

        // Title Size
        $this->add_control(
            'title_size',
            [
                'label' => esc_html__('Text Size', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-widget-text' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Title weight
        $this->add_control(
            'title_weight',
            [
                'label' => esc_html__('Text Weight', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '100' => esc_html__('100', 'rlm-widgets'),
                    '200' => esc_html__('200', 'rlm-widgets'),
                    '300' => esc_html__('300', 'rlm-widgets'),
                    '400' => esc_html__('400', 'rlm-widgets'),
                    '500' => esc_html__('500', 'rlm-widgets'),
                    '600' => esc_html__('600', 'rlm-widgets'),
                    '700' => esc_html__('700', 'rlm-widgets'),
                    '800' => esc_html__('800', 'rlm-widgets'),
                    '900' => esc_html__('900', 'rlm-widgets'),
                ],
                'default' => '400',
                'selectors' => [
                    '{{WRAPPER}} .header-widget-text' => 'font-weight: {{VALUE}};',
                ],
            ]
        );

        // Transform
        $this->add_control(
            'title_transform',
            [
                'label' => esc_html__('Text Transform', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => esc_html__('None', 'rlm-widgets'),
                    'capitalize' => esc_html__('Capitalize', 'rlm-widgets'),
                    'uppercase' => esc_html__('Uppercase', 'rlm-widgets'),
                    'lowercase' => esc_html__('Lowercase', 'rlm-widgets'),
                ],
                'default' => 'none',
                'selectors' => [
                    '{{WRAPPER}} .header-widget-text' => 'text-transform: {{VALUE}};',
                ],
            ]
        );

        // Line Height
        $this->add_control(
            'title_line_height',
            [
                'label' => esc_html__('Line Height', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-widget-text' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Min Height
        $this->add_control(
            'title_min_height',
            [
                'label' => esc_html__('Min Height', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'default' => [
                    'unit' => 'px',
                    'size' => 250,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-widget-text' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Alignment
        $this->add_control(
            'alignment',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Alignment', 'rlm-widgets'),
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'rlm-widgets'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'rlm-widgets'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'rlm-widgets'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .header-widget-text' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Vertical Alignment
        $this->add_control(
            'vertical_alignment',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Vertical Alignment', 'rlm-widgets'),
                'options' => [
                    'top' => [
                        'title' => esc_html__('Top', 'rlm-widgets'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'rlm-widgets'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'end' => [
                        'title' => esc_html__('Bottom', 'rlm-widgets'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .header-widget-text' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        // Background Overlay
        $this->add_control(
            'background_overlay',
            [
                'label' => esc_html__('Background Overlay', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.2)',
                'selectors' => [
                    '{{WRAPPER}} .header-widget' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Header width
        $this->add_control(
            'header_width',
            [
                'label' => esc_html__('Header Width', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', '%'],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-div' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Background color
        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'black',
                'selectors' => [
                    '{{WRAPPER}} .header-div' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Margins
        $this->add_responsive_control(
            'margin',
            [
                'label' => esc_html__('Margin', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', '%'],
                'selectors' => [
                    '{{WRAPPER}} .header-div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes('title', 'basic');
?>

        <!-- Background image div -->
        <div class="header-div" style="display: flex; width:100%; background-position: <?php echo esc_attr($settings['background_image_position']) ?>; background-size: <?php echo esc_attr($settings['background_image_size']) ?>; background-image: url('<?php echo esc_url($settings['background_image']['url']) ?>');">
            <div class="header-widget" style=" width: 100%; ">
                <h1 class="header-widget-text pt-title" style="display: flex;
  flex-direction: column;"><?php echo esc_attr($settings['title']) ?></h1>
            </div>
        </div>

    <?php
    }

    protected function content_template()
    {
    ?>
        <# view.addInlineEditingAttributes( 'title' , 'basic' ); #>
            <div class="header-div" style="display: flex; width:100%; background-position: {{ settings.background_image_position }}; background-size: {{ settings.background_image_size }}; background-image: url('{{ settings.background_image.url }}');">
                <div class="header-widget" style=" width: 100%; ">
                    <h1 class="header-widget-text pt-title" style="display: flex;
    flex-direction: column;"><span {{{ view.getRenderAttributeString( 'title' ) }}}>{{{ settings.title }}}</span></h1>
                </div>
            </div>

    <?php
    }
}
