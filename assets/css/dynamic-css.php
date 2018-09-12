<?php
/* ----------------------------------------------------------------------------------------
 * Dynamic Style File.
 * File Path : assets/css/dynamic-css.php
 * Descrption : This file is responsible for all STYLE changes from the themeoptions link.
 * ----------------------------------------------------------------------------------------
 */

 /* --------- Topbar style variables ------------ */ 
$topbar_background_color   =  $data['topbar_background']  ;
$topbar_text_color         =  $data['text_color']  ;
$topbar_text_hover_color   =  $data['text_hover_color']  ;

$topbar_topborder_color         =  $data['topbar_top_border']['color']  ;
$topbar_topborder_style         =  $data['topbar_top_border']['style']  ;
$topbar_topborder_width         =  $data['topbar_top_border']['width']  ;

$topbar_bottomborder_color      =  $data['topbar_bottom_border']['color']  ;
$topbar_bottomborder_style      =  $data['topbar_bottom_border']['style']  ;
$topbar_bottomborder_width      =  $data['topbar_bottom_border']['width']  ;

/* --------- Header & Menu style ------------ */
$header_opacity         = $data['header_bg_opacity'] < 10 ? '0.'.$data['header_bg_opacity'] : '1';
$header_bg_color        = hexToRgb ( $data['header_bg_color'], $header_opacity );
$header_shadwo          = $data['header_shadow'] != 0 ? '0 7px 6px -6px #777' : 'none' ;
$menu_uppercase         = ! empty( $data['uppercase_menu'] ) ? 'uppercase' : 'none' ;
$menu_font_color        = ! empty( $data['menu_font_color'] ) ? hexToRgb ( $data['menu_font_color'], 1 ) : '#fff' ;
$menu_font_hover_color  = ! empty( $data['menu_font_hover_color'] ) ? hexToRgb ( $data['menu_font_hover_color'], 1 ) : '#fff' ;
$hover_bg_color         = ! empty( $data['menu_bg_hover_color'] ) ? hexToRgb ( $data['menu_bg_hover_color'], 1 ) : '#fff' ;
$header_height          =  124 + $data['header_height']  ;

$menu_hover_style = $data['menu_hover_style'];

if ( is_array ($menu_font_color )  ) {
    $menu_font_color = ( implode(array_keys($menu_font_color)) . '(' . implode(', ', $menu_font_color) . ')' );
}
if ( is_array ($menu_font_hover_color )  ) {
    $menu_font_hover_color = ( implode(array_keys($menu_font_hover_color)) . '(' . implode(', ', $menu_font_hover_color) . ')' );
}
if ( is_array ($hover_bg_color )  ) {
    $hover_bg_color = ( implode(array_keys($hover_bg_color)) . '(' . implode(', ', $hover_bg_color) . ')' );
}
if ( $menu_hover_style == 'none' ) {
    $hover_bg_color = 'unset';
}
/* --------- Footer style ------------ */
$footer_bg_color        = hexToRgb ( $data['footer_background_color'] );
$footer_font_color      = ! empty( $data['footer_text_color'] ) ? hexToRgb ( $data['footer_text_color'], 1 ) : '#fff' ;
$footer_link_color      = ! empty( $data['footer_link_color'] ) ? hexToRgb ( $data['footer_link_color'], 1 ) : '#999' ;

if ( is_array ($footer_font_color )  ) {
    $footer_font_color = ( implode(array_keys($footer_font_color)) . '(' . implode(', ', $footer_font_color) . ')' );
}
if ( is_array ($footer_link_color )  ) {
    $footer_link_color = ( implode(array_keys($footer_link_color)) . '(' . implode(', ', $footer_link_color) . ')' );
}

if ( $data['enable_footer_link_box_shadow'] != 0  ) {
    $footer_link_box_shadow = 'inset 0 0 0 rgba(255, 255, 255, 0), 0 1px 0 '.$footer_font_color.' ';
    $footer_link_hover_box_shadow = 'inset 0 0 0 rgba(255, 255, 255, 0), 0 3px 0 '.$footer_font_color.' ';
}else {
    $footer_link_box_shadow = 'unset';
    $footer_link_hover_box_shadow = 'unset';
}

$footer_icons_font_size         =  $data['social_icons_font_size']  ;
$footer_icons_color             =  $data['footer_icons_color']  ;

$footer_icons_custom_color      =  $data['icons_custom_color']  ;
if ( $footer_icons_custom_color != 0 ) {
    $footer_icons_hover_color               =  $data['footer_icons_hover_color']  ;
    $footer_icons_background_color          =  $data['footer_icons_background_color']  ;
    $footer_icons_background_hover_color    = ! empty( $data['footer_icons_background_hover_color'] ) ? $data['footer_icons_background_hover_color'] : 'transparent'  ;    
    $footer_icons_shape_option              = ! empty( $data['footer_icons_shape'] ) ? $data['footer_icons_shape'] : 'rectangle'  ;       
    $footer_icons_border_option             = ! empty( $data['footer_icons_border_only'] ) ? $data['footer_icons_border_only'] : '0'  ;    
    
    // Chaeck the Icon Shape type.
    switch ($footer_icons_shape_option) {
        case "circle":
            $radius_shape = "50%";
            break;
        case "rounded":
            $radius_shape = "5px";
            break;
        default:
            $radius_shape = "0px";
    }

    // Change the Width, Height & line-height for the icons Background.
    if ( $footer_icons_font_size >= '12' && $footer_icons_font_size <= '15' ) {
        $bg_size = '28px';
    }elseif ( $footer_icons_font_size >= '16' && $footer_icons_font_size <= '19' ) {
        $bg_size = '32px';
    }else {
        $bg_size = '40px';
    }
    
    // Change from Background to Border Only.
    $border_type = '0px';
    if ( $footer_icons_border_option != 0 ) {
       $border_type                         = '1px solid';
       $border_color                        = $footer_icons_background_color;
       $footer_icons_background_color       = 'unset';
       $border_hover_color                  = $footer_icons_background_hover_color;
       $footer_icons_background_hover_color = 'unset';

    }

}
//echo '<tt><pre>'. var_export($topbar_background_color , TRUE) .'</pre></tt>';
?>
/* ------- Topbar daynamic CSS -------- */
.header-top{
    background-color:<?php echo $topbar_background_color; ?>;
    border-bottom:<?php echo $topbar_bottomborder_width; ?>px <?php echo $topbar_bottomborder_style; ?> <?php echo $topbar_bottomborder_color; ?>;
    border-top:<?php echo $topbar_topborder_width; ?>px <?php echo $topbar_topborder_style; ?> <?php echo $topbar_topborder_color; ?>;
    color: <?php echo $topbar_text_color; ?>;
}
.header-top a{
    color: <?php echo $topbar_text_color; ?>;
    opacity: 0.5;
}
.header-top a:hover{
    color: <?php echo $topbar_text_hover_color; ?>;
    opacity: 1;
}
/* ------------ Header & Menu Dynamic Style ------------------- */
.site-header ,
.stickymenu.is-sticky,
.stickyadmin.is-sticky {
    background-color: <?php echo ( implode(array_keys($header_bg_color)) . '(' . implode(', ', $header_bg_color) . ')' ); ?> ! important; 
    box-shadow:       <?php echo $header_shadwo; ?> ;
}
.navbar-nav .nav-link {
    text-transform : <?php echo $menu_uppercase; ?>; 
}
.navbar-nav .nav-link {
    color: <?php echo $menu_font_color; ?> ! important;     
}
.navbar-nav li a:hover {
    background-color: unset ! important;
    color: <?php echo $menu_font_hover_color; ?> ! important;     
}
.none-menu .nav-link:hover,
.none-menu .active,
.none-menu .active > .nav-link{
    background-color: unset ! important;    
    color: <?php echo $menu_font_hover_color; ?> ! important;
}
.boxed-menu .nav-link:hover,
.boxed-menu .active > .nav-link{
    background-color: <?php echo $hover_bg_color; ?> ! important;    
    color: <?php echo $menu_font_hover_color; ?> ! important;
}
.underline-menu > li > a {
    position:relative;
}
.underline-menu > li > a:hover::before,
.underline-menu > li > a:focus::before{
    background-color: <?php echo $hover_bg_color; ?> ! important;    
    content: "";
    width: 100%;
    position: absolute;
    height: 3px;
    bottom: 0;
    left: 0;
}
.underline-menu .active a {
    color: <?php echo $menu_font_hover_color; ?> ! important; 
}
.underline-menu .active {
    background-color: unset;
}
.underline-menu .active ::before{
    background-color: <?php echo $hover_bg_color; ?> ! important;  
    content: "";
    width: 100%;
    position: absolute;
    height: 3px;
    bottom: 0;
    left: 0;
}
.underline-menu .active ::before {
    background-color: <?php echo $hover_bg_color; ?> ! important;  
    content: "";
    width: 100%;
    position: absolute;
    height: 3px;
    bottom: 0;
    left: 0;
}
/* --------- Footer style ------------ */
.site-footer {
	border-top: 0px solid #eee;
    background-color:<?php echo ( implode(array_keys($footer_bg_color)) . '(' . implode(', ', $footer_bg_color) . ')' ); ?> ! important;
    color: <?php echo $footer_font_color; ?>;
}
.site-footer .site-info {
    font-size: 13px;
}
.site-footer .site-info a {
        color: <?php echo $footer_link_color; ?>;
        box-shadow: <?php echo $footer_link_box_shadow ; ?>
}
.site-footer .site-info a:hover {
        color: <?php echo $footer_link_color; ?>;
        box-shadow: <?php echo $footer_link_hover_box_shadow ; ?>
}
.footer-icons a{    
    font-size: <?php echo $footer_icons_font_size; ?>px;
    color: <?php echo $footer_icons_color; ?>;
}
.footer-icons a:hover svg {
    color: <?php echo $footer_icons_hover_color; ?> ! important;
}
.l-list-inline li a{
    background-color: <?php echo $footer_icons_background_color; ?>;
    border: <?php echo $border_type; echo $border_color; ?> ;
    border-radius: <?php echo $radius_shape;  ?>;
    width: <?php echo $bg_size; ?>;
    height: <?php echo $bg_size; ?>;
    line-height: <?php echo $bg_size; ?>;
}
.l-list-inline li a:hover {
    background-color: <?php echo $footer_icons_background_hover_color; ?>;
    border: <?php echo $border_type; echo $border_hover_color; ?> ;
}