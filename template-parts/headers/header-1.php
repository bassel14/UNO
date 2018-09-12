<?php
/**
 * The template part for displaying Header1
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Uno Blog 1.0
 *
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Global Variable for theme option
global $data;
    
    /* Get the options of the header
     * 1- check fixed @ top NAV or not
     * 2- check theme styledark or light
     * 2- check shrink NAV or not
     * 3- check fluid NAV or not
     */

    
    $menu_data = is_admin_bar_showing() ? 'data-toggle="sticky-onscroll-adminbar"' : 'data-toggle="sticky-onscroll"' ;

    $menu_fixed =  $data['fixed-top'] == TRUE ? $menu_data : '';

    /* 
     * <nav class="navbar navbar-expand-lg navbar-dark <?php echo $fixed_class; ?>">
     * The menu HOVER style according to theme options page.
    */
    $class = 'navbar-nav mr-auto';
    if ( $data['menu_hover_style'] == 'boxed' ) {
        $class .= ' boxed-menu';
    }elseif ( $data['menu_hover_style'] == 'underline' ){
        $class .= ' underline-menu';
    }elseif ( $data['menu_hover_style'] == 'none' ){
        $class .= ' none-menu';
    }
//echo '<tt><pre>'. var_export($data['topbar_background'], TRUE) .'</pre></tt>';
?>
<!-- navbar navbar-expand-lg navbar-dark bg-dark -->




  
    <nav class="navbar navbar-expand-xl navbar-dark" <?php echo $menu_fixed;?>  >

        <div class="container">

            <!--<div class="brand_container">-->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
                    <img src=<?php echo $data['wg_header_logo'];  ?> class="d-inline-block align-top" alt="LOGO" />
                    <?php if ( $data['logo_options'] != 'none' ) { ?>
                    <span class="slogan">
                        <strong><?php bloginfo('title');  ?></strong><br />
                        <?php bloginfo('description');  ?>
                    </span>
                    <?php } ?>
                </a>
            <!--</div> -->


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <?php     
                if ( ! has_nav_menu( 'primary' ) && is_admin() ) {
                    echo no_menu();
                } else {
                /* wp_nav_menu(array(
                        'theme_location'	=> 'primary',
                        'menu_id'           => 'primary-menu',
                        'container'         => false ,
                        'container_id'		=> '',//cssmenu
                        'menu_class'		=> $class,
                        'depth'             => 2,
                        'walker'            => new Bootstrap_NavWalker(),
                        'fallback_cb'       => 'Bootstrap_NavWalker::fallback',
                    ));*/
                    
                    wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'depth'          => 2,
                            'container'      => false,
                            'menu_class'     => $class, //'navbar-nav mr-auto underline-menu',
                            'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                            // Process nav menu using our custom nav walker.
                            /*'walker'		 => new CSS_Menu_Maker_Walker()*/
                            'walker'         => new WP_Bootstrap_Navwalker(),
                        ) );
                }
            ?>
            </div>
        </div> 

    </nav>
          