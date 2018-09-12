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

global $data;

    /* Get the options of the header
     * 1- check fixed @ top NAV or not
     * 2- check theme styledark or light
     * 2- check shrink NAV or not
     * 3- check fluid NAV or not
     */

    // 1- if it is fixed menu
    $fixed_class = '';
    if ( $data['fixed-top'] == '1' ){
        $fixed_class = 'fixed-top';
    }

    // 2- get the theme style dark or light, Gold, Grene & Blue
    $theme_style = $data['theme-style'];

    switch ($theme_style) {
            case 'gold':
                $theme_style = ' navbar-gold';
                break;
            case 'green':
                $theme_style = ' navbar-green';
                break;
            case 'blue':
                $theme_style = ' navbar-blue';
                break;
            case 'light':
                $theme_style = ' navbar-default';   
                break;
            default:
                $theme_style = ' navbar-inverse';
    }
    //echo '<tt><pre>'. var_export($data['fixed-top'], TRUE) .'</pre></tt>';
    /* 
     * The menu HOVER style according to theme options page.
    */
    if ( $data['menu_hover_style'] == 'boxed' ) {
        $class = 'nav navbar-nav boxed-menu';
    }elseif ( $data['menu_hover_style'] == 'underline' ){
        $class = 'nav navbar-nav underline-menu';
    }elseif ( $data['menu_hover_style'] == 'none' ){
        $class = 'nav navbar-nav none-menu';
    }else {
        $class =  'nav navbar-nav';
    }
?>
<header id="nav-header" class="navbar <?php echo $theme_style; ?> " role="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">

                <div class="navbar-header header3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span> 
                                </button>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
                                    <img src=<?php echo $data['wg_header_logo'];  ?> alt="LOGO" />
                                </a>
                            </div>
                            <!-- end col-md-5 -->

                            <div class="col-md-7">
                              <a href="#" class="header-advertising pull-right">
                                    <img src="http://placehold.it/720x90" alt="">
                              </a>
                            </div>
                            <!-- end col-md-7 -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container fluid -->            
                </div>
                <!-- end header3 -->

                <div class="collapse navbar-collapse header3-menu <?php echo $fixed_class; ?>" id="myNavbar">            
                    <?php     
                        if ( ! has_nav_menu( 'primary' ) ) {
                            echo no_menu();
                        } else {
                           wp_nav_menu(array(
                                'theme_location'	=> 'primary',
                                'container'         => false ,
                                'container_id'		=> '',//cssmenu
                                'menu_class'		=> $class,
                                'walker'			=> new CSS_Menu_Maker_Walker()
                            ));
                        }
                    ?>
                </div>
                
            </div>
            <!--end of col-12-->
        </div>
        <!--end row-->        
    </div>
    <!--end container-fluid-->
    
</header>
    