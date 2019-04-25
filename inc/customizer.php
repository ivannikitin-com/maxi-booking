<?php
/**
 * MaxiBooking Theme Customizer
 *
 * @package MaxiBooking
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function max_book_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'max_book_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'max_book_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'max_book_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function max_book_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function max_book_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function max_book_customize_preview_js() {
	wp_enqueue_script( 'max_book-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'max_book_customize_preview_js' );

add_action('customize_register', function($customizer) {
	$customizer->add_section(
		'settings-site', array(
				'title'         => 'Настройки сайта',
				'description'   => 'Контактная информация на сайте',
				'priority'      => 11,
		)
	);

	$customizer->add_setting( 'copyright', array(
		'default' => ''
	) );
	$customizer->add_control(
			'copyright',
			array(
					'label'     => __('Copyright', 'max_book'),
					'section'   => 'settings-site',
					'type'      => 'textarea',
			)
	);

	$customizer->add_setting( 'address', array(
		'default' => ''
	) );
	$customizer->add_control(
			'address',
			array(
					'label'     => __('Addres', 'max_book'),
					'section'   => 'settings-site',
					'type'      => 'textarea',
			)
	);

	$customizer->add_setting( 'email', array(
		'default' => ''
	) );
	$customizer->add_control(
			'email',
			array(
					'label'     => __('Email', 'max_book'),
					'section'   => 'settings-site',
					'type'      => 'text',
			)
	);

	$customizer->add_setting( 'vk', array(
		'default' => ''
	) );
	$customizer->add_control(
			'vk',
			array(
					'label'     => __('Vkontakte', 'max_book'),
					'section'   => 'settings-site',
					'type'      => 'text',
			)
	);

	$customizer->add_setting( 'facebook', array(
		'default' => ''
	) );
	$customizer->add_control(
			'facebook',
			array(
					'label'     => __('Facebook', 'max_book'),
					'section'   => 'settings-site',
					'type'      => 'text',
			)
	);

	$customizer->add_setting( 'youtube', array(
		'default' => ''
	) );
	$customizer->add_control(
			'youtube',
			array(
					'label'     => __('Youtube', 'max_book'),
					'section'   => 'settings-site',
					'type'      => 'text',
			)
	);

	$customizer->add_setting( 'twitter', array(
		'default' => ''
	) );
	$customizer->add_control(
			'twitter',
			array(
					'label'     => __('Twitter', 'max_book'),
					'section'   => 'settings-site',
					'type'      => 'text',
			)
	);

	$customizer->add_setting( 'instagram', array(
		'default' => ''
	) );
	$customizer->add_control(
			'instagram',
			array(
					'label'     => __('Instagram', 'max_book'),
					'section'   => 'settings-site',
					'type'      => 'text',
			)
	);

	$customizer->add_setting( 'standart_image', array(
		'default' => ''
	) );

	$customizer->add_control(
		new WP_Customize_Image_Control(
			$customizer,
			'standart_image',
			array(
				'label'      => __( 'Upload a logo standart', 'max_book' ),
				'section'    => 'settings-site',
			)
		)
	);

	$customizer->add_setting( 'footer_image_1', array(
		'default' => ''
	) );

	$customizer->add_control(
		new WP_Customize_Image_Control(
			$customizer,
			'footer_image_1',
			array(
				'label'      => __( 'Footer logo', 'max_book' ),
				'section'    => 'settings-site',
			)
		)
	);

	$customizer->add_setting( 'slogan', array(
		'default' => ''
	) );

	$customizer->add_control(
		new WP_Customize_Image_Control(
			$customizer,
			'slogan',
			array(
				'label'      => __( 'Slogan', 'max_book' ),
				'section'    => 'settings-site',
			)
		)
	);
});
