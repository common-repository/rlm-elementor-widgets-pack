<?php
class Elementor_Copyright_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'copyright_widget';
    }

    public function get_title()
    {
        return esc_html__('Copyright w/ Year', 'rlm-widgets');
    }

    public function get_icon()
    {
        return 'eicon-calendar';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['copyright', 'rlm'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Copyright Info', 'rlm-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'business',
            [
                'label' => esc_html__('Business Name', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Zach\'s Copyright Widget', 'rlm-widgets'),
            ]
        );

        $this->add_control(
            'developer',
            [
                'label' => esc_html__('Developer', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Relevant Local Media', 'rlm-widgets'),
            ]
        );

        $this->add_control(
            'developer-link',
            [
                'label' => esc_html__('Link', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('relevantlocalmedia.com', 'rlm-widgets'),
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

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .copyright-widget' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
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
                    '{{WRAPPER}} .copyright-div' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <div class="copyright-div">
            <small class="copyright-widget">
                <?php echo esc_attr($settings['business'] . ' © ' . date("Y") . ' by '); ?>
                <a href="https://<?php echo esc_attr($settings['developer-link']) ?>" target="_blank" rel="noopener"><?php echo esc_attr($settings['developer']) ?></a>
            </small>
        </div>

<?php
    }
}
