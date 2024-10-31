<?php
class Elementor_Menu_Section_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'menu-section-widget';
    }

    public function get_title()
    {
        return esc_html__('Food Menu', 'rlm-widgets');
    }

    public function get_icon()
    {
        return 'eicon-menu-card';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['menu', 'rlm'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Menu Sections', 'rlm-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        /* Start repeater */

        $repeater = new \Elementor\Repeater();

        // Title of section
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Burgers', 'rlm-widgets'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // ID of the section
        $repeater->add_control(
            'id',
            [
                'label' => esc_html__('ID', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('burgers', 'rlm-widgets'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );


        // Menu items
        $repeater->add_control(
            'menu',
            [
                'label' => esc_html__('Menu', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__('burgers', 'rlm-widgets'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        /* End repeater */

        $this->add_control(
            'list',
            [
                'label' => esc_html__('List Items', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),           /* Use our repeater */
                'default' => [
                    [
                        'title' => esc_html__('Burgers', 'rlm-widgets'),
                        'menu' => 'burgers',
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
                    '{{WRAPPER}} .menu-section-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Button Color', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-section-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label' => esc_html__('Hover Color', 'rlm-widgets'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-section-btn:hover' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .menu-button-scroller' => 'text-align: {{VALUE}};',
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
        <div class="menu-button-scroller" style="margin-left:auto; margin-right:auto; overflow-x:auto;">

            <?php foreach ($settings['list'] as $index => $item) : ?>
                <h6 class="pt-title">
                    <?php echo esc_attr($item['title']) ?>
                </h6>
                <?php
                echo '<p>' . esc_attr($item['menu']) . '</p>';
                ?>
            <?php endforeach; ?>
        </div>
<?php
    }
}
