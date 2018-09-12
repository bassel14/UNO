<?php
/**
 * The template part for displaying The TopBar Menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Uno Blog 1.0
 *
 */
?>
<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

?>
<div class="topbar-menu">
<?php
    wp_nav_menu(array(
        'theme_location'	=> 'topbar',
        'container'         => false ,
        'container_id'		=> '',//cssmenu
        'menu_class'		=> 'topbar-menu-elements',
        'walker'			=> new CSS_Menu_Maker_Walker()
    ));

?>
</div>