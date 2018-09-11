<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uno
 */

get_header();
?>

<div class="container wrap">
   
    <div class="row">
       
        <div class="col-md-9">
           
            <div id="primary" class="content-area">
		
                <main id="main" class="site-main">

                <?php
                if ( have_posts() ) :

                    if ( is_home() && ! is_front_page() ) :
                        ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                        <?php
                    endif;

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/standards/content', get_post_format() );


                    endwhile;

                    the_posts_pagination( array(
                        'prev_text' => uno_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . uno_get_svg( array( 'icon' => 'arrow-right' ) ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
                    ) );

                else :

                    get_template_part( 'template-parts/standards/content', 'none' );

                endif;
                ?>

                </main><!-- #main -->

            </div><!-- #primary -->
            
        </div><!-- #col-md-9 -->  
        
        <div class="col-md-3 ">
            <?php get_sidebar(); ?>
        </div><!-- #col-md-3 -->
              
    </div><!-- #row -->
    
</div><!-- #container -->

	

<?php get_footer(); ?>
