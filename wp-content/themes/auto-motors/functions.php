<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'auto_motors_after_setup_theme' );
function auto_motors_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'auto-motors-featured-image', 2000, 1200, true );
    add_image_size( 'auto-motors-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function auto_motors_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'auto-motors' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'auto-motors' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'auto-motors' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'auto-motors' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'auto-motors' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'auto-motors' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'auto-motors' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-motors' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'auto-motors' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-motors' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'auto-motors' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-motors' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'auto-motors' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-motors' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'auto_motors_widgets_init' );

// enqueue styles for child theme
function auto_motors_enqueue_styles() {

    wp_enqueue_style( 'auto-motors-fonts', automobile_hub_fonts_url(), array(), null );

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // owl-carousel
    wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'auto-motors-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'auto-motors-child-style' ), '1.0' );
    
    // enqueue parent styles
    wp_enqueue_style('automobile-hub-style', get_template_directory_uri() .'/style.css');
    
    // enqueue child styles
    wp_enqueue_style('auto-motors-child-style', get_stylesheet_directory_uri() .'/style.css', array('automobile-hub-style'));

    require get_theme_file_path( '/tp-theme-color.php' );
    wp_add_inline_style( 'auto-motors-child-style',$automobile_hub_tp_theme_css );

    wp_enqueue_script('owl.carousel-js', esc_url( get_theme_file_uri() ) . '/assets/js/owl.carousel.js',array('jquery'),'2.3.4',     TRUE);

    wp_enqueue_script('auto-motors-custom-js', esc_url( get_theme_file_uri() ) . '/assets/js/auto-motors-custom.js',array('jquery'),'2.3.4',TRUE
    );
    
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'auto_motors_enqueue_styles');

function auto_motors_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'auto-motors-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'auto_motors_admin_scripts' );

add_action( 'init', 'auto_motors_remove_my_action');
function auto_motors_remove_my_action() {
    remove_action( 'admin_menu','automobile_hub_menu' );
    remove_action( 'admin_notices','automobile_hub_activation_notice' );
}

function auto_motors_header_style() {
    if ( get_header_image() ) :
    $custom_header = "
        .headerbox{
            background-image:url('".esc_url(get_header_image())."');
            background-position: center top;
        }";
        wp_add_inline_style( 'auto-motors-child-style', $custom_header );
    endif;
}
add_action( 'wp_enqueue_scripts', 'auto_motors_header_style' );

// Featured Cars Meta
function auto_motors_bn_custom_meta_featured() {
    add_meta_box( 'bn_meta', __( 'Car Feature Meta Feilds', 'auto-motors' ), 'auto_motors_meta_callback_featured_car', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'auto_motors_bn_custom_meta_featured');
}

function auto_motors_meta_callback_featured_car( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'auto_motors_featured_car_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $compare_price = get_post_meta( $post->ID, 'auto_motors_compare_price', true );
    $body_type = get_post_meta( $post->ID, 'auto_motors_body_type', true );
    $model_year = get_post_meta( $post->ID, 'auto_motors_model_year', true );
    $engine_type  = get_post_meta( $post->ID, 'auto_motors_engine_type', true );
    $car_color = get_post_meta( $post->ID, 'auto_motors_car_color', true );
    $mileage = get_post_meta( $post->ID, 'auto_motors_mileage', true );
    ?>
    <div id="custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Compare Price', 'auto-motors' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_motors_compare_price" id="auto_motors_compare_price" value="<?php echo esc_attr($compare_price); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Body-Type', 'auto-motors' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_motors_body_type" id="auto_motors_body_type" value="<?php echo esc_attr($body_type); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Model-Year', 'auto-motors' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_motors_model_year" id="auto_motors_model_year" value="<?php echo esc_attr($model_year); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Engine-Type', 'auto-motors' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_motors_engine_type" id="auto_motors_engine_type" value="<?php echo esc_attr($engine_type); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Color', 'auto-motors' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_motors_car_color" id="auto_motors_car_color" value="<?php echo esc_attr($car_color); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Mileage', 'auto-motors' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_motors_mileage" id="auto_motors_mileage" value="<?php echo esc_attr($mileage); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function auto_motors_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['auto_motors_featured_car_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['auto_motors_featured_car_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Compare Price
    if( isset( $_POST[ 'auto_motors_compare_price' ] ) ) {
        update_post_meta( $post_id, 'auto_motors_compare_price', strip_tags( wp_unslash( $_POST[ 'auto_motors_compare_price' ]) ) );
    }
    // Save Car Body-Type
    if( isset( $_POST[ 'auto_motors_body_type' ] ) ) {
        update_post_meta( $post_id, 'auto_motors_body_type', strip_tags( wp_unslash( $_POST[ 'auto_motors_body_type' ]) ) );
    }
    // Save Car Model-Year
    if( isset( $_POST[ 'auto_motors_model_year' ] ) ) {
        update_post_meta( $post_id, 'auto_motors_model_year', strip_tags( wp_unslash( $_POST[ 'auto_motors_model_year' ]) ) );
    }
    // Save Car Engine-Type
    if( isset( $_POST[ 'auto_motors_engine_type' ] ) ) {
        update_post_meta( $post_id, 'auto_motors_engine_type', strip_tags( wp_unslash( $_POST[ 'auto_motors_engine_type' ]) ) );
    }
    // Save Car Color
    if( isset( $_POST[ 'auto_motors_car_color' ] ) ) {
        update_post_meta( $post_id, 'auto_motors_car_color', strip_tags( wp_unslash( $_POST[ 'auto_motors_car_color' ]) ) );
    }
    // Save Car Mileage
    if( isset( $_POST[ 'auto_motors_mileage' ] ) ) {
        update_post_meta( $post_id, 'auto_motors_mileage', strip_tags( wp_unslash( $_POST[ 'auto_motors_mileage' ]) ) );
    }
}
add_action( 'save_post', 'auto_motors_bn_metadesig_save' );

if ( ! defined( 'AUTOMOBILE_HUB_PRO_THEME_NAME' ) ) {
    define( 'AUTOMOBILE_HUB_PRO_THEME_NAME', esc_html__( 'Auto Motors Pro Theme', 'auto-motors' ));
}
if ( ! defined( 'AUTOMOBILE_HUB_PRO_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_PRO_THEME_URL', 'https://www.themespride.com/themes/cars-wordpress-theme/' );
}