<?php
class Elementor_RLM_Button_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'rlm_button_widget';
    }
    public function get_title()
    {
        return esc_html__('RLM Smart Button', 'rlm-widgets');
    }
    public function get_icon()
    {
        return 'eicon-button';
    }
    public function get_categories()
    {
        return ['basic'];
    }
    public function get_keywords()
    {
        return ['button', 'rlm'];
    }
    protected function register_controls()
    {
        // Content Tab Start
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Button Info', 'rlm-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Order Online', 'rlm-widgets'),
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'rlm-widgets'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'button_size',
            [
                'label' => esc_html__('Button Size', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'medium',
                'options' => [
                    'small' => esc_html__('Small', 'rlm-widgets'),
                    'medium' => esc_html__('Medium', 'rlm-widgets'),
                    'large' => esc_html__('Large', 'rlm-widgets'),
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab Start

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Button Style', 'rlm-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .rlm-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Button Background Color', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .rlm-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .rlm-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Button Hover Background Color', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .rlm-button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => esc_html__('Button Typography', 'rlm-widgets'),
                'selector' => '{{WRAPPER}} .rlm-button',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => esc_html__('Button Border', 'rlm-widgets'),
                'selector' => '{{WRAPPER}} .rlm-button',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Button Border Radius', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .rlm-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Button Padding', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .rlm-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '10',
                    'right' => '20',
                    'bottom' => '10',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        // Bottom left or bottom right choice and distance from side
        $this->add_control(
            'button_position',
            [
                'label' => esc_html__('Button Position', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__('Default', 'rlm-widgets'),
                    'left' => esc_html__('Bottom Left', 'rlm-widgets'),
                    'right' => esc_html__('Bottom Right', 'rlm-widgets'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .rlm-button' => 'position: fixed; {{VALUE}}: 40px;',
                ],
            ]
        );

        $this->add_control(
            'button_z_index',
            [
                'label' => esc_html__('Button Z-Index', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '999',
                'selectors' => [
                    '{{WRAPPER}} .rlm-button' => 'z-index: {{VALUE}}',
                ],
            ]
        );

        // Box shadow
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'label' => esc_html__('Button Box Shadow', 'rlm-widgets'),
                'selector' => '{{WRAPPER}} .rlm-button',
            ]
        );

        // Width
        $this->add_responsive_control(
            'button_width',
            [
                'label' => esc_html__('Button Width', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'unit' => 'px',
                    'size' => 200,
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rlm-button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Button Padding', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rlm-button' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Bottom margin slider
        $this->add_responsive_control(
            'button_bottom_margin',
            [
                'label' => esc_html__('Button Bottom Margin', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rlm-button' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('button', 'class', 'rlm-button');
        $this->add_render_attribute('button', 'class', 'rlm-button-' . $settings['button_size']);
        $this->add_render_attribute('button', 'href', $settings['button_link']['url']);
        $this->add_render_attribute('button', 'target', $settings['button_link']['is_external'] ? '_blank' : '_self');
        $this->add_render_attribute('button', 'rel', $settings['button_link']['nofollow'] ? 'nofollow' : 'noopener');
?>
        <a style="
	text-align:center;" <?php echo esc_attr($this->get_render_attribute_string('button')); ?> href="" class="rlm" rel="noopener">
            <?php echo esc_attr($settings['button_text']); ?>
        </a>
<?php
    }
}
