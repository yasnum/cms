<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 * @package bpt-bootstrap
 */
final class bptbootstrap_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		
		locate_template( 'customize/section-pro.php', TRUE, TRUE );
		
		// Header contact info.
		$manager->add_section( 'header_contact_section', array(
			 'title'    => esc_attr__( 'Header Contact info', 'bpt-bootstrap' ),
			 'priority' => 35,
		) );

		$manager->add_setting('h_skype', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$manager->add_control('h_skype', array(
			'label'      => __( 'Skype', 'bpt-bootstrap' ),
			'section'    => 'header_contact_section',
			'settings'   => 'h_skype',
			'type'       => 'text',
		));

		$manager->add_setting('h_email', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_email',
		) );
		$manager->add_control('h_email', array(
			'label'      => __( 'Email', 'bpt-bootstrap' ),
			'section'    => 'header_contact_section',
			'settings'   => 'h_email',
			'type'       => 'email',
		));

		$manager->add_setting('h_mob', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$manager->add_control('h_mob', array(
			'label'      => __( 'Phone Number', 'bpt-bootstrap' ),
			'section'    => 'header_contact_section',
			'settings'   => 'h_mob',
			'type'       => 'text',
		));

		// Social media.
		$manager->add_section( 'social_section', array(
			 'title'    => esc_attr__( 'Social media', 'bpt-bootstrap' ),
			 'priority' => 35,
		) );
		$manager->add_setting('fb_link', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		) );
		$manager->add_control('fb_link', array(
			'label'      => __( 'Facebook', 'bpt-bootstrap' ),
			'section'    => 'social_section',
			'settings'   => 'fb_link',
			'type'       => 'url',
		));
		
		$manager->add_setting('tw_link', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		) );
		$manager->add_control('tw_link', array(
			'label'      => __( 'Twitter', 'bpt-bootstrap' ),
			'section'    => 'social_section',
			'settings'   => 'tw_link',
			'type'       => 'url',
		));
		
		$manager->add_setting('google_plus', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		) );
		$manager->add_control('google_plus', array(
			'label'      => __( 'Google Plus', 'bpt-bootstrap' ),
			'section'    => 'social_section',
			'settings'   => 'google_plus',
			'type'       => 'url',
		));
		
		$manager->add_setting('dribbble', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		) );
		$manager->add_control('dribbble', array(
			'label'      => __( 'Dribbble', 'bpt-bootstrap' ),
			'section'    => 'social_section',
			'settings'   => 'dribbble',
			'type'       => 'url',
		));
		
		$manager->add_setting('pinterest', array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		) );
		$manager->add_control('pinterest', array(
			'label'      => __( 'Pinterest', 'bpt-bootstrap' ),
			'section'    => 'social_section',
			'settings'   => 'pinterest',
			'type'       => 'url',
		));


		// Register custom section types.
		$manager->register_section_type( 'bptbootstrap_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section(
			new bptbootstrap_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'BPT bootstrap Pro', 'bpt-bootstrap' ),
					'pro_text' => esc_html__( 'Go Pro',         'bpt-bootstrap' ),
					'pro_url'  => 'http://www.buyprotheme.com/product/bootstrap-modern-business-theme/',
					'priority'  => 1,
				)
			)
		);

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'bptbootstrap-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bptbootstrap-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize/customize-controls.css' );
	}
}

// Doing this customizer thang!
bptbootstrap_Customize::get_instance();
