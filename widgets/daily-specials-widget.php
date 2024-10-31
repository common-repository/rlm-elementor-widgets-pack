<?php

class Elementor_Daily_Specials_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'daily_specials';
	}

	public function get_title()
	{
		return __('Daily Specials', 'rlm-widgets');
	}

	public function get_icon()
	{
		return 'eicon-star';
	}

	public function get_categories()
	{
		return ['rlm', 'restaurant', 'food', 'menu'];
	}


	public function get_keywords()
	{
		return ['rlm', 'restaurant', 'food', 'menu', 'specials'];
	}

	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_content',
			[
				'label' => __('Content', 'rlm-widgets'),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name',
			[
				'label' => __('Name', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Special Name', 'rlm-widgets'),
			]
		);

		$repeater->add_control(
			'price',
			[
				'label' => __('Price', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('$0.00', 'rlm-widgets'),
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => __('Description', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Special Description', 'rlm-widgets'),
			]
		);

		$repeater->add_control(
			'ingredients',
			[
				'label' => __('Ingredients', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Special Ingredients', 'rlm-widgets'),
			]
		);

		$repeater->add_control(
			'nutritional_info',
			[
				'label' => __('Nutritional Info', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Special Nutritional Info', 'rlm-widgets'),
			]
		);

		$this->add_control(
			'specials',
			[
				'label' => __('Daily Specials', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->add_control(
			'more_info_button_label',
			[
				'label' => __('More Info Button Label', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('More Info', 'rlm-widgets'),
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __('View', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'grid' => __('Grid', 'rlm-widgets'),
					'list' => __('List', 'rlm-widgets'),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'rlm-widgets'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => __('Color', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .daily-specials-item' =>
					'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __('Background Color', 'rlm-widgets'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .daily-specials-item' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		if (empty($settings['specials'])) {
			return;
		}

		if ('grid' === $settings['view']) {
			echo '<div class="daily-specials-grid">';
		} else {
			echo '<ul class="daily-specials-list">';
		}

		foreach ($settings['specials'] as $special) {
			if ('grid' === $settings['view']) {
				echo '<div class="daily-specials-item">';
			} else {
				echo '<li class="daily-specials-item">';
			}
			echo '<h3 class="daily-specials-item-name">' . esc_attr($special['name']) . '</h3>';
			echo '<span class="daily-specials-item-price">' . esc_attr($special['price']) . '</span>';
			echo '<p class="daily-specials-item-description">' . esc_attr($special['description']) . '</p>';
			echo '<div class="daily-specials-item-more-info" style="display: none;">';
			echo '<h4>' . esc_html__('Ingredients', 'rlm-widgets') . '</h4>';
			echo '<p>' . esc_attr($special['ingredients']) . '</p>';
			echo '<h4>' . esc_html__('Nutritional Info', 'rlm-widgets') . '</h4>';
			echo '<p>' . esc_attr($special['nutritional_info']) . '</p>';
			echo '</div>';
			if ('grid' === $settings['view']) {
				echo '</div>';
			} else {
				echo '</li>';
			}
			echo '<script>';
			echo 'jQuery( document ).ready( function() { console.log( "ready!" );';
			echo 'jQuery( ".daily-specials-item-more-info-button" ).click( function() {console.log( "click!" );';
			echo 'jQuery( this ).parent().find( ".daily-specials-item-more-info" ).hide(); console.log(jQuery( this ).parent().find( ".daily-specials-item-more-info" ));';
			echo '} );';
			echo '} );';
			echo '</script>';
		}

		if ('grid' === $settings['view']) {
			echo '</div>';
		} else {
			echo '</ul';
		}
	}

	protected function _content_template() {}
}
