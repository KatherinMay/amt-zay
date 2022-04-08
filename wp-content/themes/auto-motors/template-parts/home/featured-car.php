<?php
/**
 * Template part for displaying feature car section
 *
 * @package Auto Motors
 * @subpackage auto_motors
 */
?>

<section id="featured-car" class="py-5 text-center">
  <div class="container">
    <?php if( get_theme_mod('auto_motors_featured_car_section_tittle') != ''){ ?>
      <h2 class="mb-5"><?php echo esc_html(get_theme_mod('auto_motors_featured_car_section_tittle','')); ?></h2>
    <?php }?>
    <div class="owl-carousel">
      <?php 
        $post_category = get_theme_mod('auto_motors_featured_car_section_category');
        if($post_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $post_category ,'auto-motors')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>            
          <div class="cat-inner-box mb-3">
            <div class="car-inner-content py-4 px-3">
              <h3><?php the_title(); ?></h3>
              <?php if( get_post_meta($post->ID, 'auto_motors_compare_price', true) ) {?>
                <p class="my-3"><?php echo esc_html(get_post_meta($post->ID,'auto_motors_compare_price',true)); ?></p>
              <?php }?>
              <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
            </div>
            <div class="featured-car-box">
              <?php if( get_post_meta($post->ID, 'auto_motors_body_type', true) ) {?>
                <span><?php echo esc_html(get_post_meta($post->ID,'auto_motors_body_type',true)); ?></span>
              <?php }?>
              <?php if( get_post_meta($post->ID, 'auto_motors_model_year', true) ) {?>
                <span><?php echo esc_html(get_post_meta($post->ID,'auto_motors_model_year',true)); ?></span>
              <?php }?>
              <?php if( get_post_meta($post->ID, 'auto_motors_engine_type', true) ) {?>
                <span><?php echo esc_html(get_post_meta($post->ID,'auto_motors_engine_type',true)); ?></span>
              <?php }?>
              <?php if( get_post_meta($post->ID, 'auto_motors_car_color', true) ) {?>
                <span><?php echo esc_html(get_post_meta($post->ID,'auto_motors_car_color',true)); ?></span>
              <?php }?>
              <?php if( get_post_meta($post->ID, 'auto_motors_mileage', true) ) {?>
                <span><?php echo esc_html(get_post_meta($post->ID,'auto_motors_mileage',true)); ?></span>
              <?php }?>
            </div>
          </div>
          <?php endwhile;
          wp_reset_postdata();
        }
      ?>
    </div>
  </div>
</section> 