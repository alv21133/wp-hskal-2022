<?php
/**
 * The template for displaying home page.
 * @package BlogBee
 */

if ( 'posts' == get_option( 'show_on_front' )  || 'posts' != get_option( 'show_on_front' )){ 
    get_header(); ?>
    <?php $enabled_sections = blogbee_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured_slider' ) ){ ?>
                <?php $disable_featured_slider = blogbee_get_option( 'disable_featured_slider_section' );
                if( true == $disable_featured_slider): ?>
                    
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">   
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'about' ) { ?>
                <?php $disable_about_section = blogbee_get_option( 'disable_about_section' );
                if( true ==$disable_about_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                    
            <?php endif; ?>   

            <?php } elseif( $section['id'] == 'message' ) { ?>
                <?php $disable_message_section = blogbee_get_option( 'disable_message_section' );
                if( true ==$disable_message_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">
                        
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>

                    </section>
            <?php endif; ?>


            <?php } elseif( $section['id'] == 'popular' ) { ?>
                <?php $disable_popular_section = blogbee_get_option( 'disable_popular_section' );
                 if( true ==$disable_popular_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; 

             }
        }
    }
    $disable_homepage_content_section = blogbee_get_option( 'disable_homepage_content_section' );
    if('posts' == get_option( 'show_on_front' )){
        include( get_home_template() );
    } elseif(($disable_homepage_content_section == true ) && ('posts' != get_option( 'show_on_front' ))) {
            include( get_page_template() );
        }

    get_footer();
} 
else{
    include( get_page_template() );
}