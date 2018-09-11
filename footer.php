<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uno
 */

?>

	</div><!-- #content -->



<footer id="colophon" class="site-footer">
    
    <diV class="footer-wrap">
        
        <div class="copyright" >
            
            <div class="container">

                    <div class="row">

                        <div class="col-md-5">

                            <div class="site-info">

                                <?php 
                                    global $data;
                                    $footer = $data[SHORTNAME.'footer_text'];

                                    $footer_vars     = array( '%copy%', '%year%', '%site%', '%url%' );
                                    $footer_values   = array( '&copy;', date('Y') , get_bloginfo('name') , home_url() );
                                    $footer_info     = str_replace( $footer_vars , $footer_values, $footer);

                                    //echo htmlspecialchars_decode ( $footer_info );
                                    echo ( $footer_info );
                                //echo '<tt><pre>'. var_export($footer, TRUE) .'</pre></tt>';                                
                                ?>
                                <br />
                                <?php 
                                    // Give Credits to Webgear Media And WordPress.
                                    $footer = $data[SHORTNAME.'credits']; 
                                    if ( '1' == $footer ) {                                        
                                ?>
                                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'uno' ) ); ?>">
                                        <?php
                                        /* translators: %s: CMS name, i.e. WordPress. */
                                        printf( esc_html__( 'Proudly powered by %s', 'uno' ), 'WordPress' );
                                        ?>
                                    </a>
                                    <span class="sep"> | </span>                        
                                    <?php   
                                    /* translators: 1: Theme name, 2: Theme author. */
                                    printf( esc_html__( '%1$s Theme, by %2$s.', 'uno' ), 'Uno', '<a href="http://webgearmedia.com">Webgear Media</a>' );

                                ?>
                                <?php  } ?>

                            </div><!-- .site-info -->

                        </div><!-- .col-md-6 -->

                        <div class="col-md-7">

                            <?php 
                                /*
                                 * Include social links tamplate.
                                 */
                                get_template_part( 'template-parts/footer/footer-social', 'links' ); 
                            ?>

                        </div>
                        <!-- end col-md-6 -->

                    </div><!-- .row -->

            </div><!-- #container -->
        
        </div><!-- #copyright -->
        
    </diV><!-- #wrap -->
    
</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
