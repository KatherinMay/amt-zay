<?php
/**
 * Envo Shopper Theme Info
 *
 * @package Envo Shopper
 */

function envo_shopper_customizer_theme_info( $wp_customize ) {
	$theme_data = wp_get_theme();
    $wp_customize->add_section( 'theme_info', array(
  		'title'       => esc_html__( 'Video Documentation & Demo' , 'envo-shopper' ),
  		'priority'    => 6,
  	) );
    
    /** Important Links */
	  $wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<p>';
    if ( !envo_shopper_is_pro_activated() ) {
    	/* translators: %s: "demos here" string */
    	$theme_info .= sprintf( __( 'You can use this theme to create a website like these %1$s', 'envo-shopper' ),  '<a href="' . esc_url( 'https://envothemes.com/envo-shopper/' ) . '" target="_blank">' . esc_html__( 'demos', 'envo-shopper' ) . '</a>' );
    }
    $theme_info .= '</p><p>';
	/* translators: %s: "documentation" string */
    $theme_info .= sprintf( __( 'For step-by-step videos and text tutorials, see %1$s', 'envo-shopper' ),  '<a href="' . esc_url( 'https://envothemes.com/docs/' ) . '" target="_blank">' . esc_html__( 'documentation', 'envo-shopper' ) . '</a>' );   
    $theme_info .= '</p>';

	  $wp_customize->add_control( new envo_shopper_Info_Text( $wp_customize,
        'theme_info_theme', 
            array(
                'section'     => 'theme_info',
                'description' => $theme_info
            )
        )
    );
    
    
}
add_action( 'customize_register', 'envo_shopper_customizer_theme_info' );

if ( class_exists( 'WP_Customize_control' ) ) {

	class envo_shopper_Info_Text extends Wp_Customize_Control {
		
		public function render_content(){ ?>
    	    <span class="customize-control-title">
    			<?php echo esc_html( $this->label ); ?>
    		</span>
    
    		<?php if( $this->description ){ ?>
    			<span class="description customize-control-description">
    			<?php echo wp_kses_post($this->description); ?>
    			</span>
    		<?php }
        }
	}
}

if( class_exists( 'WP_Customize_Section' ) ) :
/**
 * Adding Go to Pro Section in Customizer
 * https://github.com/justintadlock/trt-customizer-pro
 */
class envo_shopper_Customize_Section_Pro extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'pro-section';

	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';

	/**
	 * Custom pro button URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}
endif;

add_action( 'customize_register', 'envo_shopper_page_sections_pro' );
function envo_shopper_page_sections_pro( $manager ) {
	// Register custom section types.
	$manager->register_section_type( 'envo_shopper_Customize_Section_Pro' );

	// Register sections.
	$manager->add_section(
		new envo_shopper_Customize_Section_Pro(
			$manager,
			'envo_shopper_page_view_pro',
			array(
				'title'    => esc_html__( 'PRO version', 'envo-shopper' ),
				'priority' => 5, 
				'pro_text' => esc_html__( 'View PRO version', 'envo-shopper' ),
				'pro_url'  => 'https://envothemes.com/product/envo-shopper-pro/'
			)
		)
	);
}