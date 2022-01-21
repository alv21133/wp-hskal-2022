<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BlogBee
 */

if ( ! function_exists( 'blogbee_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blogbee_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		'%s',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);


	if( is_single() || is_archive() || is_front_page() ){
		$byline = sprintf(
	        esc_html_x( 'By %s', 'post author', 'blogbee' ),
	        '<span class="author vcard"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" class="url" itemprop="url">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</a></span>'
	    );
	    echo '<span class="byline">' . $byline . '</span>';
	}
	echo '<span class="date">' . $posted_on . '</span>'; // WPCS: XSS OK.
	$meta = blogbee_read_time( get_post_field( 'post_content', get_the_ID() ) );
	if ( !empty( $meta ) ) {
		$meta = '<spam class="read-time"><i class="fa fa-clock-o"></i>'.$meta.' '.__('min read', 'blogbee').' </spam>';
		echo $meta;
	}

}
endif;

if ( ! function_exists( 'blogbee_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blogbee_entry_meta() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( );
		if ( $categories_list && blogbee_categorized_blog() ) {
			printf( '<span class="cat-links">%1$s</span>', $categories_list ); // WPCS: XSS OK.
		}
	}

	if ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'blogbee' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	
}
endif;

/* 	Calculate reading time by content length */
if ( !function_exists( 'blogbee_read_time' ) ):
	function blogbee_read_time( $text ) {
		$words = str_word_count( strip_tags( $text ) );
		if ( !empty( $words ) ) {
			$time_in_minutes = ceil( $words / 130 );
			return $time_in_minutes;
		}
		return false;
	}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function blogbee_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'blogbee_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'blogbee_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so blogbee_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so blogbee_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in blogbee_categorized_blog.
 */
function blogbee_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'blogbee_categories' );
}
add_action( 'edit_category', 'blogbee_category_transient_flusher' );
add_action( 'save_post',     'blogbee_category_transient_flusher' );
