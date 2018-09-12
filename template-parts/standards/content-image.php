<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uno
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
	    
	<div class="entry-content">
		<?php
        
        if ( ! empty ( has_excerpt() ) && ! is_singular() ) {
            $my_excerpt = get_the_excerpt();
            echo $my_excerpt;
            echo sprintf( '<a class="more-link" href="%1$s">%2$s%3$s</a>',
                get_permalink(),
                __( 'Continue reading...', 'uno' ),
                '<i class="fas fa-arrow-right"></i>'
            );
        }else {
            
            if ( '' === get_the_post_thumbnail() ) {
                the_content( sprintf(
                    wp_kses(
                             //translators: %s: Name of current post. Only visible to screen readers 
                            __( 'Continue reading...%2$s<span class="screen-reader-text"> "%1$s"</span>', 'uno' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title(),
                        '<i class="fas fa-arrow-right"></i>'
                    ) );  
            }         
        }
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uno' ),
			'after'  => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
		) );
        
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	
		<?php uno_entry_footer(); ?>
		
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->


<hr />