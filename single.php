<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/standards/content', get_post_type() );
                    
                    /* The Post Pagination Section */
                    the_post_navigation(
                        array(
                            'prev_text' => '' . uno_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous Post', 'uno' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'uno' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"></span>%title</span>',
                            'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'uno' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'uno' ) . '</span>    ' . uno_get_svg( array( 'icon' => 'arrow-right' ) ) . '<span class="nav-title">%title<span class="nav-title-icon-wrapper"></span></span>',
                        )
                    );
                    echo '<hr>';
                    
                    
                    /* Author Biography Section */
                    
                    
                    
                    
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

                </main><!-- #main -->

            </div><!-- #primary -->
            
        </div><!-- #col -->
        
        <div class="col-md-3 ">
            
            <?php get_sidebar(); ?>
            
        </div><!-- #col-md-3 -->
        
    </div><!-- #row -->
    
</div><!-- #container <-->


<?php get_footer(); ?>
