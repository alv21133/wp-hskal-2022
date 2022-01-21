<?php 
/**
 * Template part for displaying Featured Slider Section
 *
 *@package BlogBee
 */
    $slider_category = blogbee_get_option( 'slider_category' );
    ?>
    
    <div class="featured_slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed":800, "dots": true, "arrows":true, "autoplay": true, "fade": false }'>

         <?php   $args = array (

                'posts_per_page' =>3,              
                'post_type' => 'post',
                'post_status' => 'publish',
                'paged' => 1,
                );
                if ( absint( $slider_category ) > 0 ) {
                    $args['cat'] = absint( $slider_category );
                } 

        $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    <article class="slick-item" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <?php $image_overlay   = blogbee_get_option( 'disable_white_overlay' );
                            $class='';
                            if (false == $image_overlay) { 
                                $class='image-overlay';
                            } else{
                                $class='content-overlay';
                            }
                            if (false == $image_overlay)  {
                            ?>
                            <div class="overlay"></div>
                        <?php } ?>
                        <div class="wrapper">
                            <div class="<?php echo esc_attr($class); ?> featured-content-wrapper">
                                <header class="entry-header">
                                    <div class="entry-meta">
                                        <?php blogbee_entry_meta(); ?>
                                    </div><!-- .entry-meta -->

                                    <a href="<?php the_permalink();?>" >
                                        <h2 class="entry-title"><?php the_title();?></h2>
                                    </a>
                                </header>
                                <div class="separator"></div>
                                <div class="entry-meta">                 
                                    <?php blogbee_posted_on(); ?>
                                </div><!-- .entry-meta -->
                                <?php
                                $readmore_text   = blogbee_get_option( 'slider_custom_btn_text_' . $i ); 
                                if ( ! empty( $readmore_text ) ) { ?>
                                    <div class="read-more">
                                        <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                                    </div><!-- .read-more -->
                                <?php } ?>
                            </div><!-- .featured-content-wrapper -->
                        </div><!-- .wrapper -->
                    </article><!-- .slick-item -->
                <?php endwhile;?>
                <?php wp_reset_postdata();
            endif;?>
    </div><!-- .featured_slider-wrapper -->
