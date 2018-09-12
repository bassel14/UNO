<?php
/**
 * Template part for displaying video posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <header class="entry-header">
        	
		<?php
        
        if ( is_sticky() && is_home() ) :
            echo uno_get_svg( array( 'icon' => 'tack' ) );
        endif; 
        
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
        
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
                    uno_posted_on();
                    uno_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
	</header><!-- .entry-header -->

    <?php uno_post_thumbnail(); ?>
    

	<?php
		$content = apply_filters( 'the_content', get_the_content() );
		$video   = false;

		// Only get video from the content if a playlist isn't present.
        if ( false === strpos( $content, 'wp-playlist-script' ) ) {
            $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
        }
	?>

	<div class="entry-content">
        
		<?php
            if ( ! is_single() ) {

                // If not a single post, highlight the video file.
                if ( ! empty( $video ) ) {
                    foreach ( $video as $video_html ) {
                        echo '<div class="entry-video">';
                            echo $video_html;
                        echo '</div>';
                    }
                };

            };
        
            if ( ! empty ( has_excerpt() ) && ! is_singular() ) {
                $my_excerpt = get_the_excerpt();
                echo '<div class="theme-excerpt">' . $my_excerpt . '</div>';
                echo sprintf( '<a class="more-link" href="%1$s">%2$s%3$s</a>',
                    get_permalink(),
                    __( 'Continue reading...', 'uno' ),
                    '<i class="fas fa-arrow-right"></i>'
                );
            }
        
            if ( is_single() || empty( $video ) ) {

                /* translators: %s: Name of current post */
                the_content( sprintf(
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uno' ),
                    'after'  => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ) );

            };        
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	
		<?php uno_entry_footer(); ?>
		
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<hr />