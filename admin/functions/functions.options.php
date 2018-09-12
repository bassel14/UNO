<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
			
		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
        
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		// Footer Icons Shape Options
		$footer_icons_shape_options = array( "rectangle" => "Rectangle", "circle"=> "Circle", "rounded"=>"Rounded" );

        /*-----------------------------------------------------------------------------------*/
		/* Default Data Section to help theme options when reset it.
		/*-----------------------------------------------------------------------------------*/
        
        // Define the url for all assetes of the theme option internal on the theme page only
        $url =  ADMIN_DIR . 'assets/images/';
        $DIR =  ADMIN_PATH . 'assets/images/';
        
		$shortname = "wg_";

        /*-----------------------------------------------------------------------------------*/
        /* The Options Array */
        /*-----------------------------------------------------------------------------------*/

        // Set the Options Array
        global $of_options;
        $of_options = array();
        
        /*-----------------------------------------------------------------------------------*/
        /* The Helpers Arrays */
        /*-----------------------------------------------------------------------------------*/
        
        
        $body_layout 	    = array("wide" => "Wide","box" => "Boxed");

		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
        
		$social_logo        = array("over" => "Over Logo","bottom" => "Under Logo");
		$social_copyright   = array("right" => "Social Icons @ Right Side","left" => "Social Icons @ Left Side");
		$menu_hover_style   = array("none" => "None", "boxed" => "Boxed", "underline" => "Underline");
        $title_options   	= array("none" => "None", "both" => "Show Both", "logo" => "Logo Only", "slogon" => "slogon Only");
        
        /* TopBar Helper Array Options */ 
        $topbar_layout_options = array ( 'v1' => $url . 'patterns/topbar1.png', 'v2' => $url . 'patterns/topbar2.png', 'v3' => $url . 'patterns/topbar3.png', 
                                         'v4' => $url . 'patterns/topbar4.png', 'v5' => $url . 'patterns/topbar5.png', 'v6' => $url . 'patterns/topbar6.png'  );
		$topbar_alignment 	= array("center" => "Center","side" => "Sides");
		$topbar_direction 	= array("n" => "Normal Direction","r" => "Reverse Direction");
		$topbar_font_size   = array("Select a Size:","9","10","11","12","13","14","15");
        
        /* Header Helper Array Options */ 
		$header_layout_options = array ( 'v1' => $url . 'patterns/header1.jpg', 'v2' => $url . 'patterns/header2.jpg', 'v3' => $url . 'patterns/header3.jpg' );
		
        /* Footer Helper Array Options */ 
        $footer_layout_options = array ( 'v1' => $url . 'patterns/footer1.png' );
		
        
        
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);

        // Menu Options array 
        $menu_options_arr = array ("default"=>"Default","fixed"=>"Fixed Top");
        
        // Theme Color Style Array
        $theme_style = array (
                            "dark"=>"Dark", 
                            "light"=>"Light", 
                            "gold"=>"Gold", 
                            "green"=>"Green"
                        );
        
        
		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}

        
        

/* ---------------------------------------------------- */
/* General Options 
/* ---------------------------------------------------- */ 
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);
					
$of_options[] = array( 	"name" 		=> "Main Layout",
						"desc" 		=> "Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.",
						"id" 		=> $shortname."layout",
						"std" 		=> "no_bar",
						"type" 		=> "images",
						"options" 	=> array(
							'no_bar'    => $url . '1col.png',
							'right_bar' => $url . '2cr.png',
							'left_bar' 	=> $url . '2cl.png',
							'2_bars' 	=> $url . '3cm.png'
						)
				);    
        
$of_options[] = array( 	"name" 		=> "Select theme layout",
						"desc" 		=> "Select between Wide or Boxed site Layout. ",
						"id" 		=> $shortname."layout_option",
						"std" 		=> "wide",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"options" 	=> $body_layout
				);
				
$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		=> $shortname."google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Footer Text",
						"desc" 		=> "Paste your signature or any other text you need.(Add the following: %copy% for Copyright Symbol; %year% for the existing year; %site% to add your website/blog name; %url% to add the link to your website/blog )",
						"id" 		=> $shortname."footer_text",
						"std" 		=> "%copy% Copyright %year%. All rights reserved.for <a href='%url%'> %site% </a> Theme.",
						"type" 		=> "textarea"
				);  
        

$of_options[] = array(
                        "name"      => "",
                        "desc"      => __('Give credits to Webgear Media.', 'uno'),
                        "id"        => $shortname.'credits',
                        "std"       => '1',
                        "type"      => 'checkbox'
                ); 
        
/* ---------------------------------------------------- */
/* Logo Options 
/* ---------------------------------------------------- */ 
        
$of_options[] = array( 
                        "name"      => "Logo",
                        "type"      => "heading");

$of_options[] = array( 
                        "name"      => "Header Info",
                        "desc"      => "",
                        "id"        => $shortname."header_info",
                        "std"       => "<h3>Logo Options</h3>",
                        "icon"      => true,
                        "type"      => "info");

$of_options[] = array( 
                        "name"      => "Header Logo",
                        "desc"      => "Select an image file for your header logo.",
                        "id"        => $shortname."header_logo",
                        "std"       => $url . "d-logo.png",
						"mod"		=> "min",
                        "type"      => "media");     
        
$of_options[] = array( 
                        "name"      => "Header Logo (Retina Version @2x)",
                        "desc"      => "Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.",
                        "id"        => $shortname."header_logo_retina",
                        "std"       => "",
                        "mod"       => "",
                        "type"      => "media");

$of_options[] = array( 
                        "name"      => "Footer Logo",
                        "desc"      => "Select an image file for your header logo.",
                        "id"        => $shortname."footer_logo",
                        "std"       => $url . "d-logo.png",
						"mod"		=> "min",
                        "type"      => "media");     
        
$of_options[] = array( 
                        "name"      => "Footer Logo (Retina Version @2x)",
                        "desc"      => "Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.",
                        "id"        => $shortname."footer_logo_retina",
                        "std"       => "",
                        "mod"       => "",
                        "type"      => "media");  

$of_options[] = array( 
                        "name"      => "Favicon",
                        "desc"      => "Select an image file for your Favicon.",
                        "id"        => $shortname."upload_favicon",
                        "std"       => $url . "favicon.png",
                        "mod"       => "min",
                        "type"      => "media"); 

$of_options[] = array(
                        "name"      => __('Enable Favicon', 'uno'),
                        "desc"      => __('Enable Favicon in order to show on the browser header,(default is enabled).', 'uno'),
                        "id"        => $shortname.'enable_favicon',
                        "std"       => '1',
                        "type"      => 'checkbox'
                ); 
        
                
/* ---------------------------------------------------- */
/* Top Bar Options
/* ---------------------------------------------------- */         
        			
$of_options[] = array( 	"name" 		=> __('Topbar', 'uno'),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Topbar",
						"desc" 		=> "",
						"id" 		=> "top_bar",
						"std" 		=> "<h3>Topbar Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				); 

$of_options[] = array(
                        "name"      => __('Enable Top bar', 'uno'),
                        "desc"      => __('Enable Top Bar.', 'uno'),
                        "id"        => 'enable_top_bar',
                        "std"       => '1',
                        "type"      => 'checkbox'
                ); 
        
$of_options[] = array( 	"name" 		=> "Topbar Layout",
						"desc" 		=> "",
						"id" 		=> "topbar_layout",
						"std" 		=> "v1",
						"type" 		=> "images",
						"options" 	=> $topbar_layout_options
				);
        
$of_options[] = array( 	"name" 		=> "Content Direction",
						"desc" 		=> "Choose to keep the content direction from LTR or change it to be RTL..",
						"id" 		=> "content_direction",
						"std" 		=> "n",
						"type" 		=> "radio",
						"options" 	=> $topbar_direction
				);
        
$of_options[] = array( 	"name" 		=> "Content Alignment",
						"desc" 		=> "",
						"id" 		=> "content_alignment",
						"std" 		=> "side",
						"type" 		=> "radio",
						"options" 	=> $topbar_alignment
				);
            
				
$of_options[] = array( 	"name" 		=> "Topbar Font Size",
						"desc" 		=> "By default the topbar font size is 12px, you can change iot to the size you want. (Note: this features work for menu & contact info ONLY).",
						"id" 		=> "topbar-fontsize",
						"std" 		=> "12",
						"type" 		=> "select",
						"options" 	=> $topbar_font_size,
				); 
                
$of_options[] = array( 	"name" 		=> "Top Border",
						"desc" 		=> "Top unoer. default (4px solid #000).",
						"id" 		=> "topbar_top_border",
						"std" 		=> array(
											'width' => '4',
											'style' => 'solid',
											'color' => '#000'
										),
						"type" 		=> "border"
				);
                
$of_options[] = array( 	"name" 		=> "Bottom Border",
						"desc" 		=> "Bottom unoer. default (1px solid #000).",
						"id" 		=> "topbar_bottom_border",
						"std" 		=> array(
											'width' => '1',
											'style' => 'solid',
											'color' => '#000'
										),
						"type" 		=> "border"
				); 
				
$of_options[] = array( 	"name" 		=> "Background Color",
						"desc" 		=> "Pick a Topbar background color for the theme (default: #333).",
						"id" 		=> "topbar_background",
						"std" 		=> "#333",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Text Color",
						"desc" 		=> "Change text color for topbar. (default: #fff).",
						"id" 		=> "text_color",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Text Hover Color",
						"desc" 		=> "Change the link hover color at the topbar. (default: #999).",
						"id" 		=> "text_hover_color",
						"std" 		=> "#999",
						"type" 		=> "color"
				);
        
$of_options[] = array( 	"name" 		=> "Topbar",
						"desc" 		=> "",
						"id" 		=> "top_bar",
						"std" 		=> "<h3>Contact Information</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				); 

$of_options[] = array(
                        "name"      => "",
                        "desc"      => __('Enable Contact Information.', 'uno'),
                        "id"        => 'enable_top_bar_contact_info',
                        "std"       => '0',
                        "type"      => 'checkbox'
                ); 
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Address.",
						"id" 		=> "top_bar_address",
						"std" 		=> "",
						"type" 		=> "text"
				);
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Phone.",
						"id" 		=> "top_bar_phone",
						"std" 		=> "",
						"type" 		=> "text"
				);
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Email.",
						"id" 		=> "top_bar_email",
						"std" 		=> "",
						"type" 		=> "text"
				);
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Additional Info.",
						"id" 		=> "top_bar_info",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Topbar",
						"desc" 		=> "",
						"id" 		=> "top_bar",
						"std" 		=> "<h3>Topbar Search Form</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(
                        "name"      => "",
                        "desc"      => __('Enable Search Form.', 'uno'),
                        "id"        => 'enable_top_bar_search_form',
                        "std"       => '1',
                        "type"      => 'checkbox'
                ); 

$of_options[] = array( 	"name" 		=> "Topbar",
						"desc" 		=> "",
						"id" 		=> "top_bar",
						"std" 		=> "<h3>Topbar Social Icons</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(
                        "name"      => "",
                        "desc"      => __('Enable Social Icons.', 'uno'),
                        "id"        => 'enable_top_bar_social_icons',
                        "std"       => '1',
                        "type"      => 'checkbox'
                ); 
				
$of_options[] = array( 	"name" 		=> "Social Icons Color",
						"desc" 		=> "Social Icons color (default: #999).",
						"id" 		=> "top_bar_icons_color",
						"std" 		=> "#999",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Social Icons Hover Color",
						"desc" 		=> "Social Icons Hover color  (default: #fff).",
						"id" 		=> "top_bar_icons_hover_color",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);
        
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Facebook Link.",
						"id" 		=> "top_bar_fb",
						"std" 		=> "",
						"type" 		=> "text"
				);
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Twitter Link.",
						"id" 		=> "top_bar_twitter",
						"std" 		=> "",
						"type" 		=> "text"
				);
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Google Plus Link.",
						"id" 		=> "top_bar_gplus",
						"std" 		=> "",
						"type" 		=> "text"
				);
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Pinterest Link.",
						"id" 		=> "top_bar_pinterest",
						"std" 		=> "",
						"type" 		=> "text"
				);
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Youtube Link.",
						"id" 		=> "top_bar_youtube",
						"std" 		=> "",
						"type" 		=> "text"
				);
    
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Instagram Link.",
						"id" 		=> "top_bar_instagram",
						"std" 		=> "",
						"type" 		=> "text"
				);
        
/* ---------------------------------------------------- 
                    Header Options
/* ---------------------------------------------------- */         
        			
$of_options[] = array( 	"name" 		=> __('Header', 'uno'),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Header",
						"desc" 		=> "",
						"id" 		=> "header",
						"std" 		=> "<h3>Header Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				); 
        
$of_options[] = array( 	"name" 		=> "Header Layout",
						"desc" 		=> "",
						"id" 		=> "header_layout",
						"std" 		=> "v1",
						"type" 		=> "images",
						"options" 	=> $header_layout_options
				);
				
$of_options[] = array( 	"name" 		=> "Header Background Color",
						"desc" 		=> __('Choose Header Background Color.', 'uno'),
						"id" 		=> "header_bg_color",
						"std" 		=> "#222",
						"type" 		=> "color"
				);   
				
$of_options[] = array( 	"name" 		=> "Opacity",
						"desc" 		=> __('Background Color Opacity.', 'uno'),
						"id" 		=> "header_bg_opacity",
						"std" 		=> "10",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "Title & Slogan Options",
						"desc" 		=> __('By default the logo and slogan are not enabled. change it accordingly.', 'uno'),
						"id" 		=> "logo_options",
						"std" 		=> "none",
						"type" 		=> "radio",
						"options" 	=> $title_options
				); 
        
$of_options[] = array(
                        "name"      => "Header Shadwo",
                        "desc"      => __('Add Shadow to the bottom of the header.', 'uno'),
                        "id"        => 'header_shadow',
                        "std"       => '0',
                        "type"      => 'checkbox'
                );
        
$of_options[] = array(
                        "name"      => "Uppercase",
                        "desc"      => __('Check on to make the menu uppercase.', 'uno'),
                        "id"        => 'uppercase_menu',
                        "std"       => '0',
                        "type"      => 'checkbox'
                );  
        
$of_options[] = array(
                        "name"      => "Fixed Menu",
                        "desc"      => __('By default the menu is not fixed, choose fixed to stick it at top.', 'uno'),
                        "id"        => 'fixed-top',
                        "std"       => '0',
                        "type"      => 'checkbox'
                );  
        
$of_options[] = array(
                        "name"      => "Shrink Menu",
                        "desc"      => __('By default the menu is not Shrinked, choose Shrink with Fixed to allow the effect.', 'uno'),
                        "id"        => 'shrink-menu',
                        "std"       => '0',
                        "type"      => 'checkbox'
                ); 
				
$of_options[] = array( 	"name" 		=> "Header Height",
						"desc" 		=> __('Adjust header height accordingly.', 'uno'),
						"id" 		=> "header_height",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				); 
				
$of_options[] = array( 	"name" 		=> "Font Color",
						"desc" 		=> __('.', 'uno'),
						"id" 		=> "menu_font_color",
						"std" 		=> "#9d9d9d",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Font Hover Color",
						"desc" 		=> __('.', 'uno'),
						"id" 		=> "menu_font_hover_color",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Menu Hover Color",
						"desc" 		=> __('.', 'uno'),
						"id" 		=> "menu_bg_hover_color",
						"std" 		=> "#000",
						"type" 		=> "color"
				);
        
$of_options[] = array( 	"name" 		=> "Menu Hover Style",
						"desc" 		=> __('By default the menu hover style colored Box. change it accordingly.', 'uno'),
						"id" 		=> "menu_hover_style",
						"std" 		=> "boxed",
						"type" 		=> "radio",
						"options" 	=> $menu_hover_style
				);   
        
/* ---------------------------------------------------- */
/* Footer Options
/* ---------------------------------------------------- */         
        			
$of_options[] = array( 	"name" 		=> __('Footer', 'uno'),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Footer",
						"desc" 		=> "",
						"id" 		=> "footer",
						"std" 		=> "<h3>Footer Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				); 
        
$of_options[] = array( 	"name" 		=> "Header Layout",
						"desc" 		=> "",
						"id" 		=> "header_layout",
						"std" 		=> "v1",
						"type" 		=> "images",
						"options" 	=> $footer_layout_options
				);
        		
$of_options[] = array( 	"name" 		=> "Background Color",
						"desc" 		=> "Footer Background color (default: #222).",
						"id" 		=> "footer_background_color",
						"std" 		=> "#222",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Text Color",
						"desc" 		=> "Text color (default: #999).",
						"id" 		=> "footer_text_color",
						"std" 		=> "#999",
						"type" 		=> "color"
				);
			  
$of_options[] = array( 	"name" 		=> "Link Color",
						"desc" 		=> "Link color (default: #999, iether for a menu or for the signature.).",
						"id" 		=> "footer_link_color",
						"std" 		=> "#999",
						"type" 		=> "color"
				);

$of_options[] = array(
						"name"      => "",
						"desc"      => __('Enable Links Box Shadow.The color for the shadwo is similar to Text Color.', 'uno'),
						"id"        => 'enable_footer_link_box_shadow',
						"std"       => '1',
						"type"      => 'checkbox'
				); 
				
				           
        
$of_options[] = array( 	"name" 		=> "Topbar",
						"desc" 		=> "",
						"id" 		=> "footer",
						"std" 		=> "<h3>Footer Social Icons</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(
                        "name"      => "",
                        "desc"      => __('Enable Social Icons.', 'uno'),
                        "id"        => 'enable_footer_social_icons',
                        "std"       => '1',
                        "type"      => 'checkbox'
                ); 

$of_options[] = array(
                        "name"      => "",
                        "desc"      => __('Enable Social Icons link in a new Window.', 'uno'),
                        "id"        => 'footer_social_icons_target',
                        "std"       => '1',
                        "type"      => 'checkbox'
                ); 

$of_options[] = array( 	"name" 		=> "Icons Font Size",
						"desc" 		=> "Social Icons Font Size, default (16px)",
						"id" 		=> "social_icons_font_size",
						"std" 		=> "16",
						"min" 		=> "12",
						"step"		=> "1",
						"max" 		=> "24",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "Social Icons Color",
						"desc" 		=> "Social Icons color (default: #fff).",
						"id" 		=> "footer_icons_color",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);
		
		
$of_options[] = array( 	"name" 		=> "Icons Custom Shape & Colors",
						"desc" 		=> "Use Custom Shapes & Colors for your Social Icons.(it will override the default color schima for the icons.).",
						"id" 		=> "icons_custom_color",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "checkbox"
				);

	$of_options[] = array( 	"name" 		=> "Social Icons Hover Color",
						"desc" 		=> "Social Icons Hover color (This feature will override the default hover color.).",
						"id" 		=> "footer_icons_hover_color",
						"std" 		=> "#fff",
						"fold" 		=> "icons_custom_color", /* the checkbox hook */
						"type" 		=> "color"
				);
		
	$of_options[] = array( 	"name" 		=> "Social Icons Background Color",
						"desc" 		=> "Social Icons Background color (default: #fff).",
						"id" 		=> "footer_icons_background_color",
						"std" 		=> "#fff",
						"fold" 		=> "icons_custom_color", /* the checkbox hook */
						"type" 		=> "color"
				);
		
	$of_options[] = array( 	"name" 		=> "Social Icons Background Hover Color",
						"desc" 		=> "Social Icons Background Hover color  (default: #222).",
						"id" 		=> "footer_icons_background_hover_color",
						"std" 		=> "#222",
						"fold" 		=> "icons_custom_color", /* the checkbox hook */
						"type" 		=> "color"
				);		
				
				
	$of_options[] = array( 	"name" 		=> "Icons Shape",
							"desc" 		=> "Choose the icons background shape.",
							"id" 		=> "footer_icons_shape",
							"std" 		=> "rectangle",
							"fold" 		=> "icons_custom_color", /* the checkbox hook */
							"type" 		=> "select",
							"options" 	=> $footer_icons_shape_options
						);	

	$of_options[] = array(
							"name"      => "Icons Border Only",
							"desc"      => __('Enable outside Border only.', 'uno'),
							"id"        => 'footer_icons_border_only',
							"std"       => '0',
							"fold" 		=> "icons_custom_color", /* the checkbox hook */
							"type"      => 'checkbox'
					); 	






				
$of_options[] = array( 	"name" 		=> "Folding Checkbox",
				"desc" 		=> "This checkbox will hide/show a couple of options group. Try it out!",
				"id" 		=> "offline",
				"std" 		=> 0,
				"folds" 	=> 1,
				"type" 		=> "checkbox"
		);
				
	$of_options[] = array( 	"name" 		=> "Social Icons Holder Background Color",
								"desc" 		=> "Social Icons Background color (default: #333).",
								"id" 		=> "footer_icons_holder_background_color",
								"std" 		=> "#333",
								"fold" 		=> "offline", /* the checkbox hook */
								"type" 		=> "color"
						);
				
	$of_options[] = array( 	"name" 		=> "Social Icons Holder Top Border Style.",
							"desc" 		=> "Social Icons Holder Top Border Style (defaults: width:1px, Solid, #000).",
							"id" 		=> "footer_social_icons_holder_top_border",
							"std" 		=> array(
												'width' => '1',
												'style' => 'solid',
												'color' => '#000'
											),
							"fold" 		=> "offline", /* the checkbox hook */
							"type" 		=> "border"
					);
					
	$of_options[] = array( 	"name" 		=> "Social Icons Holder Bottom Border Style",
							"desc" 		=> "Social Icons Holder Bottom Border Style (defaults: width:1px, Solid, #000).",
							"id" 		=> "footer_social_icons_holder_bottom_border",
							"std" 		=> array(
												'width' => '1',
												'style' => 'solid',
												'color' => '#000'
											),
							"fold" 		=> "offline", /* the checkbox hook */
							"type" 		=> "border"
					);

/* ---------------------------------------------------- */
/* Social Icons Links 
/* ---------------------------------------------------- */ 							
$of_options[] = array( 	"name" 		=> __('Social Links', 'uno'),
						"type" 		=> "heading"
				);

        $of_options[] = array(
                            "name"  => __('Facebook', 'uno'),
                            "desc"  => __('add your Facebook url link here.', 'uno'),
                            "id"    => 'social_facebook_link',
                            "std"   => '',
                            "type"  => 'text');

        $of_options[] = array(
                            "name"  => __('Twitter', 'uno'),
                            "desc"  => __('add your Twitter url link here.', 'uno'),
                            "id"    => 'social_twitter_link',
                            "std"   => '',
                            "type"  => 'text');

        $of_options[] = array(
                            "name"  => __('Google+', 'uno'),
                            "desc"  => __('add your Google+ url link here.', 'uno'),
                            "id"    => 'social_googleplus_link',
                            "std"   => '',
                            "type"  => 'text');

        $of_options[] = array(
                            "name"  => __('Pinterest', 'uno'),
                            "desc"  => __('add your Pinterest url link here.', 'uno'),
                            "id"    => 'social_pinterest_link',
                            "std"   => '',
                            "type"  => 'text');

        $of_options[] = array(
                            "name"  => __('Instagram', 'uno'),
                            "desc"  => __('add your Instagram url link here.', 'uno'),
                            "id"    => 'social_instagram_link',
                            "std"   => '',
                            "type"  => 'text');

        $of_options[] = array(
                            "name"  => __('Flickr', 'uno'),
                            "desc"  => __('add your Flickr url link here.', 'uno'),
                            "id"    => 'social_flickr_link',
                            "std"   => '',
                            "type"  => 'text');

        $of_options[] = array( 
                            "name"  => __('LinkedIn', 'uno'),
                            "desc"  => __('add your LinkedIn url link here.', 'uno'),
                            "id"    => "social_linkedin_link",
                            "std"   => "",
                            "type"  => "text");

        $of_options[] = array(
                            "name"  => __('Youtube', 'uno'),
                            "desc"  => __('add your Youtube url link here.', 'uno'),
                            "id"    => 'social_youtube_link',
                            "std"   => '',
                            "type"  => 'text');

        $of_options[] = array( 
                            "name"  => __('Vimeo', 'uno'),
                            "desc"  => __('add your Vimeo url link here.', 'uno'),
                            "id"    => "social_vimeo_link",
                            "std"   => "",
                            "type"  => "text");
        

        $of_options[] = array( 
                            "name"  => __('RSS', 'uno'),
                            "desc"  => __('add your RSS url link here.', 'uno'),
                            "id"    => "social_rss_link",
                            "std"   => "",
                            "type"  => "text");

        $of_options[] = array( 
                            "name"  => __('Tumblr', 'uno'),
                            "desc"  => __('add your Tumblr url link here.', 'uno'),
                            "id"    => "social_tumblr_link",
                            "std"   => "",
                            "type"  => "text");


        $of_options[] = array( 
                            "name"  => __('Dribbble', 'uno'),
                            "desc"  => __('add your Dribbble url link here.', 'uno'),
                            "id"    => "social_dribbble_link",
                            "std"   => "",
                            "type"  => "text");

       $of_options[] = array( 
                            "name"  => __('Digg', 'uno'),
                            "desc"  => __('add your Digg url link here.', 'uno'),
                            "id"    => "social_digg_link",
                            "std"   => "",
                            "type"  => "text");

        $of_options[] = array( 
                            "name"  => __('Skype', 'uno'),
                            "desc"  => __('add your Skype url link here.', 'uno'),
                            "id"    => "social_skype_link",
                            "std"   => "",
                            "type"  => "text");

        $of_options[] = array( 
                            "name"  => __('Deviantart', 'uno'),
                            "desc"  => __('add your Deviantart url link here.', 'uno'),
                            "id"    => "social_deviantart_link",
                            "std"   => "",
                            "type"  => "text");

        $of_options[] = array( 
                            "name"  => __('Yahoo', 'uno'),
                            "desc"  => __('add your Yahoo url link here.', 'uno'),
                            "id"    => "social_yahoo_link",
                            "std"   => "",
                            "type"  => "text");

        $of_options[] = array( 
                            "name"  => __('Reddit', 'uno'),
                            "desc"  => __('add your Reddit url link here.', 'uno'),
                            "id"    => "social_reddit_link",
                            "std"   => "",
                            "type"  => "text");

        $of_options[] = array( 
                            "name"  => __('Custom Social Link', 'uno'),
                            "std"  => __('<h3 style=\'margin: 0;\'>Custom Social Link</h3>', 'uno'),
                            "id"    => "custom_social_link",
                            "icon"  => true,
                            "type"  => "info"); 

        $of_options[] = array( 
                            "name"  => __('Custom Social Name', 'uno'),
                            "desc"  => __('The Name of your Link.', 'uno'),
                            "id"    => "custom_social_name",
                            "std"   => "",
                            "type"  => "text");

        $of_options[] = array( 
                            "name"  => __('Custom Social Link', 'uno'),
                            "desc"  => __('add your custom url link here.', 'uno'),   
                            "id"    => "custom_social_link",
                            "std"   => "",
                            "type"  => "text"); 

        $of_options[] = array( 
                            "name"  => __('Custom Icon Image', 'uno'),
                            "desc"  => __('add an image file for your custom link. width (30 px).', 'uno'),
                            "id"    => "custom_social_icon_image",
                            "std"   => "",
                            "mod"   => "",
                            "type"  => "media");

        $of_options[] = array( 
                            "name"  => __('Custom Icon Image Retina', 'uno'),
                            "desc"  => __('add an image file for your custom link for the retina version. It should be 2x the size of main icon.', 'uno'),
                            "id"    => "custom_social_icon_image_retina",
                            "std"   => "",
                            "mod"   => "",
                            "type"  => "media"); 
              
  
/* ---------------------------------------------------- */
/* Style Options
/* ---------------------------------------------------- */ 
        			
$of_options[] = array( 	"name" 		=> __('Style', 'uno'),
						"type" 		=> "heading"
				);   

$of_options[] = array( 	"name" 		=> "Style",
						"desc" 		=> "",
						"id" 		=> "style",
						"std" 		=> "<h3>Style Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);    
				
$of_options[] = array( 	"name" 		=> "Theme Style",
						"desc" 		=> "By default the theme is Dark, change it to light from here.",
						"id" 		=> "theme-style",
						"std" 		=> "dark",
						"type" 		=> "select",
						"options" 	=> $theme_style,
				);  
        
        
        
        
/* ---------------------------------------------------- */
/* Original Options Add before this line.
/* ---------------------------------------------------- */     
        
        
$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				);
					
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Welcome to the Options Framework demo.</h3>
						This is a slightly modified version of the original options framework by Devin Price with a couple of aesthetical improvements on the interface and some cool additional features. If you want to learn how to setup these options or just need general help on using it feel free to visit my blog at <a href=\"http://aquagraphite.com/2011/09/29/slightly-modded-options-framework/\">AquaGraphite.com</a>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Media Uploader 3.5",
						"desc" 		=> "Upload images using native media uploader from Wordpress 3.5+.",
						"id" 		=> "media_upload_35",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Media Uploader 3.5 min",
						"desc" 		=> "Upload images using native media uploader from Wordpress 3.5+. Min mod",
						"id" 		=> "media_upload_356",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);

$of_options[] = array( 	"name" 		=> "JQuery UI Slider example 1",
						"desc" 		=> "JQuery UI slider description.<br /> Min: 1, max: 500, step: 3, default value: 45",
						"id" 		=> "slider_example_1",
						"std" 		=> "45",
						"min" 		=> "1",
						"step"		=> "3",
						"max" 		=> "500",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "JQuery UI Slider example 1 with steps(5)",
						"desc" 		=> "JQuery UI slider description.<br /> Min: 0, max: 300, step: 5, default value: 75",
						"id" 		=> "slider_example_2",
						"std" 		=> "75",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "300",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> "JQuery UI Spinner",
						"desc" 		=> "JQuery UI spinner description.<br /> Min: 0, max: 300, step: 5, default value: 75",
						"id" 		=> "spinner_example_2",
						"std" 		=> "75",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "300",
						"type" 		=> "spinner" 
				);
				
$of_options[] = array( 	"name" 		=> "Switch 1",
						"desc" 		=> "Switch OFF",
						"id" 		=> "switch_ex1",
						"std" 		=> 0,
						"type" 		=> "switch"
				);   
				
$of_options[] = array( 	"name" 		=> "Switch 2",
						"desc" 		=> "Switch ON",
						"id" 		=> "switch_ex2",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Switch 3",
						"desc" 		=> "Switch with custom labels",
						"id" 		=> "switch_ex3",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Switch 4",
						"desc" 		=> "Switch OFF with hidden options. ;)",
						"id" 		=> "switch_ex4",
						"std" 		=> 0,
						"folds"		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 1",
						"desc" 		=> "This is a sample hidden option controlled by a <strong>switch</strong> button",
						"id" 		=> "hidden_switch_ex1",
						"std" 		=> "Hi, I\'m just a text input - nr 1",
						"fold" 		=> "switch_ex4", /* the switch hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 2",
						"desc" 		=> "This is a sample hidden option controlled by a <strong>switch</strong> button",
						"id" 		=> "hidden_switch_ex2",
						"std" 		=> "Hi, I\'m just a text input - nr 2",
						"fold" 		=> "switch_ex4", /* the switch hook */
						"type" 		=> "text"
				);
				
				
$of_options[] = array( 	"name" 		=> "Homepage Layout Manager",
						"desc" 		=> "Organize how you want the layout to appear on the homepage",
						"id" 		=> "homepage_blocks",
						"std" 		=> $of_options_homepage_blocks,
						"type" 		=> "sorter"
				);
					
$of_options[] = array( 	"name" 		=> "Slider Options",
						"desc" 		=> "Unlimited slider with drag and drop sortings.",
						"id" 		=> "pingu_slider",
						"std" 		=> "",
						"type" 		=> "slider"
				);
					
$of_options[] = array( 	"name" 		=> "Background Images",
						"desc" 		=> "Select a background pattern.",
						"id" 		=> "custom_bg",
						"std" 		=> $bg_images_url."bg0.png",
						"type" 		=> "tiles",
						"options" 	=> $bg_images,
				);
					
$of_options[] = array( 	"name" 		=> "Typography",
						"desc" 		=> "Typography option with each property can be called individually.",
						"id" 		=> "custom_type",
						"std" 		=> array('size' => '12px','style' => 'bold italic'),
						"type" 		=> "typography"
				);

$of_options[] = array( 	"name" 		=> "Styling Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Theme Stylesheet",
						"desc" 		=> "Select your themes alternative color scheme.",
						"id" 		=> "alt_stylesheet",
						"std" 		=> "default.css",
						"type" 		=> "select",
						"options" 	=> $alt_stylesheets
				);
				
$of_options[] = array( 	"name" 		=> "Body Background Color",
						"desc" 		=> "Pick a background color for the theme (default: #fff).",
						"id" 		=> "body_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Header Background Color",
						"desc" 		=> "Pick a background color for the header (default: #fff).",
						"id" 		=> "header_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Footer Background Color",
						"desc" 		=> "Pick a background color for the footer (default: #fff).",
						"id" 		=> "footer_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Body Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "body_font",
						"std" 		=> array('size' => '12px','face' => 'arial','style' => 'normal','color' => '#000000'),
						"type" 		=> "typography"
				);  
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Example Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Typography",
						"desc" 		=> "This is a typographic specific option.",
						"id" 		=> "typography",
						"std" 		=> array(
											'size'  => '12px',
											'face'  => 'verdana',
											'style' => 'bold italic',
											'color' => '#123456'
										),
						"type" 		=> "typography"
				);  
				
$of_options[] = array( 	"name" 		=> "Border",
						"desc" 		=> "This is a border specific option.",
						"id" 		=> "border",
						"std" 		=> array(
											'width' => '2',
											'style' => 'dotted',
											'color' => '#444444'
										),
						"type" 		=> "border"
				);
				
$of_options[] = array( 	"name" 		=> "Colorpicker",
						"desc" 		=> "No color selected.",
						"id" 		=> "example_colorpicker",
						"std" 		=> "",
						"type" 		=> "color"
					); 
					
$of_options[] = array( 	"name" 		=> "Colorpicker (default #2098a8)",
						"desc" 		=> "Color selected.",
						"id" 		=> "example_colorpicker_2",
						"std" 		=> "#2098a8",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Input Text",
						"desc" 		=> "A text input field.",
						"id" 		=> "test_text",
						"std" 		=> "Default Value",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Input Checkbox (false)",
						"desc" 		=> "Example checkbox with false selected.",
						"id" 		=> "example_checkbox_false",
						"std" 		=> 0,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Input Checkbox (true)",
						"desc" 		=> "Example checkbox with true selected.",
						"id" 		=> "example_checkbox_true",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Normal Select",
						"desc" 		=> "Normal Select Box.",
						"id" 		=> "example_select",
						"std" 		=> "three",
						"type" 		=> "select",
						"options" 	=> $of_options_select
				);
				
$of_options[] = array( 	"name" 		=> "Mini Select",
						"desc" 		=> "A mini select box.",
						"id" 		=> "example_select_2",
						"std" 		=> "two",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"options" 	=> $of_options_radio
				); 
				
$of_options[] = array( 	"name" 		=> "Google Font Select",
						"desc" 		=> "Some description. Note that this is a custom text added added from options file.",
						"id" 		=> "g_select",
						"std" 		=> "Select a font",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is my preview text!", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=> array(
										"none" => "Select a font",//please, always use this key: "none"
										"Lato" => "Lato",
										"Loved by the King" => "Loved By the King",
										"Tangerine" => "Tangerine",
										"Terminal Dosis" => "Terminal Dosis"
						)
				);
				
$of_options[] = array( 	"name" 		=> "Google Font Select2",
						"desc" 		=> "Some description.",
						"id" 		=> "g_select2",
						"std" 		=> "Select a font",
						"type" 		=> "select_google_font",
						"options" 	=> array(
										"none" => "Select a font",//please, always use this key: "none"
										"Lato" => "Lato",
										"Loved by the King" => "Loved By the King",
										"Tangerine" => "Tangerine",
										"Terminal Dosis" => "Terminal Dosis"
									)
				);
				
$of_options[] = array( 	"name" 		=> "Input Radio (one)",
						"desc" 		=> "Radio select with default of 'one'.",
						"id" 		=> "example_radio",
						"std" 		=> "one",
						"type" 		=> "radio",
						"options" 	=> $of_options_radio
				);
				
        
$of_options[] = array( 	"name" 		=> "Image Select",
						"desc" 		=> "Use radio buttons as images.",
						"id" 		=> "images",
						"std" 		=> "warning.css",
						"type" 		=> "images",
						"options" 	=> array(
											'warning.css' 	=> $url . 'warning.png',
											'accept.css' 	=> $url . 'accept.png',
											'wrench.css' 	=> $url . 'wrench.png'
										)
				);
				
$of_options[] = array( 	"name" 		=> "Textarea",
						"desc" 		=> "Textarea description.",
						"id" 		=> "example_textarea",
						"std" 		=> "Default Text",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Multicheck",
						"desc" 		=> "Multicheck description.",
						"id" 		=> "example_multicheck",
						"std" 		=> array("three","two"),
						"type" 		=> "multicheck",
						"options" 	=> $of_options_radio
				);
				
$of_options[] = array( 	"name" 		=> "Select a Category",
						"desc" 		=> "A list of all the categories being used on the site.",
						"id" 		=> "example_category",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
				);
				
//Advanced Settings
$of_options[] = array( 	"name" 		=> "Advanced Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Folding Checkbox",
						"desc" 		=> "This checkbox will hide/show a couple of options group. Try it out!",
						"id" 		=> "offline",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 1",
						"desc" 		=> "This is a sample hidden option 1",
						"id" 		=> "hidden_option_1",
						"std" 		=> "Hi, I\'m just a text input",
						"fold" 		=> "offline", /* the checkbox hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 2",
						"desc" 		=> "This is a sample hidden option 2",
						"id" 		=> "hidden_option_2",
						"std" 		=> "Hi, I\'m just a text input",
						"fold" 		=> "offline", /* the checkbox hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_2",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Grouped Options.</h3>
						You can group a bunch of options under a single heading by removing the 'name' value from the options array except for the first option in the group.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
				$of_options[] = array( 	"name" 		=> "Some pretty colors for you",
										"desc" 		=> "Color 1.",
										"id" 		=> "example_colorpicker_3",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 2.",
										"id" 		=> "example_colorpicker_4",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 3.",
										"id" 		=> "example_colorpicker_5",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 4.",
										"id" 		=> "example_colorpicker_6",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
