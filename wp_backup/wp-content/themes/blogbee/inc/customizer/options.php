<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function blogbee_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogbee' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'blogbee_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blogbee_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'blogbee' ),
            'off'       => esc_html__( 'Disable', 'blogbee' )
        );
        return apply_filters( 'blogbee_switch_options', $arr );
    }
endif;



 ?>