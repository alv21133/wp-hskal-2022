<?php 
/**
 * Template part for displaying About Section
 *
 *@package BlogBee
 */

$number_of_about_items  = blogbee_get_option( 'number_of_about_items' );
for( $i=1; $i<=$number_of_about_items; $i++ ) :
    $about_page_posts[] = absint(blogbee_get_option( 'about_page_'.$i ) );
endfor;

?>

<div class="section-content col-3">
    <?php $args = array (
        'post_type'     => 'page',
        'post_per_page' => count( $about_page_posts ),
        'post__in'      => $about_page_posts,
        'orderby'       =>'post__in', 
    ); 
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
            $i=0;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>

            <article>

                <div class="about-item-wrapper" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">                    
                    <div class="entry-container">
                        <h4><a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a></h4>
                    </div><!-- .entry-container -->
                </div><!-- .about-item-wrapper -->
            </article>

            <?php endwhile;?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>

</div>   