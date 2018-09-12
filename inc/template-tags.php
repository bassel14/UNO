<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package uno
 */

/*
 * File Security Check
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }


/** ------------------------------------------------------------------------ *
  * 1 - Post posted on meta tags function.
 ** ------------------------------------------------------------------------ */
if ( ! function_exists( 'uno_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function uno_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        
        /*
         * if amended date is needed then take off the remarks below.
         * Change the way the amendded date is shown in front page by adding extra CSS to the theme.
        */
        
		/*
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
        */
        
        $time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'uno' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

/** ------------------------------------------------------------------------ *
  * 2 - Post posted by meta tags function.
 ** ------------------------------------------------------------------------ */
if ( ! function_exists( 'uno_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function uno_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'uno' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

/** ------------------------------------------------------------------------ *
  * 3 - Post footer meta tags function.
 ** ------------------------------------------------------------------------ */
if ( ! function_exists( 'uno_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function uno_entry_footer() {
        
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
            
            if ( is_single() ) {
				/* Add extra SPAN inside the Single Post. */
				printf( '<span class="cat-tags-links">' );                
            }
            /* translators: used between list items, there is a space after the comma */
            $separate_meta = __( ', ', 'uno' );

            // Get Categories for posts.
            $categories_list = get_the_category_list( $separate_meta );
            
			if ( $categories_list ) {
				/* translators: 1: list of categories, 2: The Font Icon SVG. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %2$s %1$s', 'uno' ) . '</span>', $categories_list, '<i class="fas fa-folder"></i>' ); // WPCS: XSS OK.
			}

            // Get Tags for posts.
            $tags_list = get_the_tag_list( '', $separate_meta );
            
            if ( ! is_single() ) {
                $separater = ' | ';
            }
            
			if ( $tags_list ) {
				/* translators: 1: list of tags, 2: The Font Icon SVG. */
				printf( '<span class="tags-links">'.$separater.'' . esc_html__( 'Tagged %2$s %1$s', 'uno' ) . '</span>', $tags_list, '<i class="fas fa-tags"></i>' ); // WPCS: XSS OK.
			}
            
            if ( is_single() ) {
				/* Closing the extra SPAN inside the Single Post. */
				printf( '</span>' );                
            }
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<div class="comments-link">
                    <i class="fas fa-comments"></i> ';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'uno' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</div>';
		}
        
        uno_edit_link();
        
	}
endif;

/** ------------------------------------------------------------------------ *
  * 4 - Post thumbnail function.
 ** ------------------------------------------------------------------------ */
if ( ! function_exists( 'uno_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function uno_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'uno-featured-image' ); ?>
                <?php  
                    // Add the thmbnail caption under thee image.
                    if ( ! empty( get_the_post_thumbnail_caption() ) ) { 
                       
                        echo '<figcaption class="wp-caption-text">'. get_the_post_thumbnail_caption() . '</figcaption>';
                    }
                ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<div class="entry-thumbnail">
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php
                    the_post_thumbnail( 'uno-featured-image', array(
                            'alt' => the_title_attribute( array(
                            'echo' => false,
                        ) ),
                    ) );
                    ?>
                </a>
			</div><!-- .post-thumbnail -->

		<?php
		endif; // End is_singular().
	}
endif;

/** ------------------------------------------------------------------------ *
  * 5 - Edit Post / Page function.
 ** ------------------------------------------------------------------------ */
if ( ! function_exists( 'uno_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 *
	 * This also gives us a little context about what exactly we're editing
	 * (post or page?) so that users understand a bit more where they are in terms
	 * of the template hierarchy and their content. Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function uno_edit_link() {
        
        edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'uno' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<div class="edit-link">',
			'</div>'
		);
	}
endif;