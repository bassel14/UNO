<?php
/**
 * The template part for displaying The TopBar
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
 
global $data;

// Topbar All Elements Varaibles.
$enable_top_bar_contact_info    = $data['enable_top_bar_contact_info'];
$enable_top_bar_social_icons    = $data['enable_top_bar_social_icons'];
$enable_top_bar_search          = $data['enable_top_bar_search_form'];
$topbar_content_alignment       = $data['content_alignment'];
$topbar_content_direction       = $data['content_direction'];

/*
* Add extra classes to the Topbar Flex
* Center Class & Direction Class.
*/
$topbar_class = $topbar_content_alignment == 'center' ? ' topbar-container-center' : '';
$topbar_class .= $topbar_content_direction == 'r' ? ' topbar-container-reverse' : '';

/*echo '<tt><pre>'. var_export($topbar_content_alignment, TRUE) .'</pre></tt>';*/
?>
<div id="top-bar" class="header-top ">

    <div class="container">

        <div class="row">
            
            <div class="col-md-12 col-xs-12">

                <div class="topbar-flex-container <?php echo $topbar_class; ?> ">
                   
                    <?php
                         /*if ($enable_top_bar_menu) { */
                             if ( has_nav_menu( 'topbar' ) ) {
                                require_once ( get_template_directory() . '/template-parts/fractions/top-menu-fraction.php'); 
                            } 
                        //}//End if top bar menu is ON. 
                    ?>
                    
                    <?php 
                        if ($enable_top_bar_contact_info) {
                            require_once ( get_template_directory() . '/template-parts/fractions/contact-info-fraction.php'); 
                        }//End if contact info is ON. 
                    ?>
                    
                </div>
                <!-- / Flex Container -->
                
            </div>
            <!-- / col-md-12 -->
            
        </div>
        <!-- / row -->

    </div>
    <!-- / container -->
    
</div>
<!-- / header-top -->

