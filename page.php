<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Uno Blog
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<?php get_header(); ?>
<?php
	// Get the Page Options Meta.
	// Check for the Sidebar Option where it should be showen and implement the sidebar if it is enabled.
	$page_options		= get_post_meta( get_the_ID(), 'theme-gear_page_header_options', true );

	$sidebar_options  	= $page_options ? $page_options['sidebar_alignment'] : NULL;

	$col_type = ( $sidebar_options == 'disable' || $sidebar_options == NULL ) ? '12' : '9' ;

	//echo '<tt><pre>'. var_export($sidebar_options, TRUE) .'</pre></tt>';
?>
<div class="container wrap">

	<div class="row">

		<?php if ( 'left' == $sidebar_options ) { ?>
			<div class="col-md-3 ">
				<?php if ( is_active_sidebar( 'pages-widget-area' ) ) : ?>
						<?php dynamic_sidebar( 'pages-widget-area' ); ?>
				<?php endif; ?>		
			</div><!-- #col-md-3 -->
		<?php } ?>

		<div class="col-md-<?php echo $col_type; ?>">

			<div id="primary" class="content-area">
				
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
				
			</div><!-- #primary -->

		</div><!-- #col-md-9 -->

		<?php if ( 'right' == $sidebar_options ) { ?>
			<div class="col-md-3 ">				
				<?php if ( is_active_sidebar( 'pages-widget-area' ) ) : ?>
						<?php dynamic_sidebar( 'pages-widget-area' ); ?>
				<?php endif; ?>				
			</div><!-- #col-md-3 -->
		<?php } ?>

	</div><!-- .row -->

    
</div><!-- .wrap -->

<?php get_footer();
