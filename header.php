<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uno
 */
?>
<?php
/* --------------------- Theme Setting ------------------------------------- */
// Call the function responsible for getting all General Option of the theme.
global $data;

$data   = of_get_options();
// Apply the fillter for Adding URL for the site of all saved DATA.
//$test = of_filter_load_media_upload($data['wg_google_analytics'])
$data   = apply_filters( 'wg_theme_url_options_filter', $data );
/* ------------------------------------------------------------------------- */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="author" content="Webgear Media">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    <!-- Favicon Meta -->
    <?php if ( !empty($data['wg_upload_favicon']) && $data['wg_enable_favicon'] == "1" ) { ?><link rel="icon" type="<?php if(0 < strrpos($data['wg_upload_favicon'], '.png') ) echo 'image/png'; elseif(0 < strrpos($data['wg_upload_favicon'], '.gif') )  echo 'image/gif'; else 'image/x-icon'; ?>" href="<?php echo $data['wg_upload_favicon'];?>"><?php } ?>

    <!-- Ping back meta -->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
    
	<link rel="profile" href="http://gmpg.org/xfn/11">   
    
    <!-- Google Analytics Code is here -->
    <?php if ( !empty($data['wg_google_analytics']) ) { 
            echo $data['wg_google_analytics']; 
          } 
    ?>


    <?php wp_head(); ?>
    
    <!-- Important Dynamic CSS atributes -->
    <style type="text/css">
        <?php
            ob_start();
            include_once get_template_directory() . '/assets/css/dynamic-css.php';
            $dynamic_css = ob_get_contents();
            ob_get_clean();
            
            echo $dynamic_css;
        ?>        
    </style>
    
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">


<header class="site-header" role="banner" id="master-head">
   
    <?php
        // Get the topbar if it is okay to show.
        $topbar = $data['enable_top_bar'];
        if ( $topbar == TRUE ) {
            
            // get the header Layout.
            $topbar_layout = $data['topbar_layout'];        
            
            switch ($topbar_layout) {
                case 'v2':
                    get_template_part( 'template-parts/topbar/topbar-2' ); 
                    break;
                case 'v3':
                    get_template_part( 'template-parts/topbar/topbar-3' ); 
                    break;
                case 'v4':
                    get_template_part( 'template-parts/topbar/topbar-4' ); 
                    break;
                case 'v5':
                    get_template_part( 'template-parts/topbar/topbar-5' ); 
                    break;
                case 'v6':
                    get_template_part( 'template-parts/topbar/topbar-6' ); 
                    break;
                default:
                    get_template_part( 'template-parts/topbar/topbar-1' );   
            } // End Case Switch
            
        } // End IF Topbar is TRUE.
	?>
   
   <!-- HEADER	 -->   
    <?php 
        // get the header Layout.
        $header_layout = $data['header_layout'];
        
        switch ($header_layout) {
            case 'v2':
                get_template_part( 'template-parts/headers/header-2' );
                break;
            case 'v3':
                get_template_part( 'template-parts/headers/header-3' );
                break;
            case 'v4':
                get_template_part( 'template-parts/headers/header-4' );
                break;
            default:
                get_template_part( 'template-parts/headers/header-1' );
        }
    ?>
    
</header>
	
	<div id="content" class="site-content">
        
        <?php
            // Get the Page Options Meta.     
            $page_options       = get_post_meta( get_the_ID(), 'theme-gear_page_header_options', true );
        
            // Get the header Option, if it is okay to show header, or if it is not then don't show it.
            
            $page_header_option = $page_options ? $page_options['page-options_header_options'] : 'NULL';
            if ( $page_header_option != no  ) {
                
                wg_theme_custom_header_features(); 
                        
                $page_breadcrumbs       = $page_options ? $page_options['page_breadcrumbs_feature'] : 'NULL';
                if ( $page_breadcrumbs != 'no'   ) {
                    wg_theme_custom_breadcrumbs();
                }

            }

        ?>
        
<?php //echo '<tt><pre>'. var_export($page_header_option, TRUE) .'</pre></tt>'; ?>