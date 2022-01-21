<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tagora
 */
?>
<?php
	$img_class='';
 if (has_post_thumbnail()){
		$img_class='has-post-thumbnail';
	} else{
		$img_class='no-post-thumbnail';
	} ?>
	
<article id="post-<?php the_ID(); ?>"  <?php post_class( 'grid-item ' . $img_class ); ?> >
	<div class="post-item">
		<?php if ( has_post_thumbnail() ) { ?>
			<figure>
			    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			    
			</figure>
			 
		<?php } ?>
		<div class="entry-meta">
			<?php blogbee_entry_meta(); ?>
		</div><!-- .entry-meta -->
		<div class="entry-container">
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<div class="entry-meta posted-on">
					<?php blogbee_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div><!-- .entry-container -->
	</div><!-- .post-item -->
</article><!-- #post-## -->
