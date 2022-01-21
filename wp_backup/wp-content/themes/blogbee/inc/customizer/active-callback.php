<?php
/**
 * Active callback functions.
 *
 * @package BlogBee
 */


function blogbee_about_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_about_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}



function blogbee_popular_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_popular_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}



function blogbee_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured_slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}


function blogbee_message_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_message_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}