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

//echo '<tt><pre>'. var_export($header_bg_color, TRUE) .'</pre></tt>';
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
<header id="nav-header" class="navbar <?php echo $theme_style; ?> <?php echo $fixed_class; ?> " role="banner">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
            </button>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
                <img src=<?php echo $data['wg_header_logo'];  ?> alt="LOGO" />
                <?php if ( $data['logo_options'] != 'none' ) { ?>
                <span class="slogan">
                    <strong><?php bloginfo('title');  ?></strong><br />
                    <?php bloginfo('description');  ?>
                </span>
                <?php } ?>
            </a>
        </div>
        <div class="collapse navbar-collapse text-right" id="myNavbar">
            
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
</header>
    