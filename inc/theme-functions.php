<?php
/*
* File Name:  Theme functions
* Author: Webgear Media
* Author URI: http://webgearmedia.com/
* Created By: Bassel
* Package: Uno Theme
* Version: 1.0
* Date: 10/5/2016
* Description: This is misc function of the theme.
* License: GNU General Public License v2 or later
*/
?>
<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $post;

// echo '<tt><pre>'. var_export($showOnHome, TRUE) .'</pre></tt>';  
/*
 * File Content:
 * 1- Header Features Function.
 * 2- Breadcrumbs Function.
*/

/** ------------------------------------------------------------------------ *
  * 1 - Header Features Function.
 ** ------------------------------------------------------------------------ */
if (! function_exists( 'wg_theme_custom_header_features' ) ) {
    
    function wg_theme_custom_header_features(){ ?>
        
        <?php if ( ( is_page() || uno_is_frontpage() ) ) : ?>
            
            <?php 
                // Get the Page Options Meta.     
                $page_options               = get_post_meta( get_the_ID(), 'theme-gear_page_header_options', true );
                
                $title_alignment            = $page_options ? $page_options['title_alignment'] : '';
                $new_page_title             = $page_options ? $page_options['new_page_title'] : '' ;
                $title_color                = $page_options ? $page_options['title_color'] : '' ;
                $page_sub_title             = $page_options ? $page_options['page_sub_title'] : '' ;
                $sub_title_color            = $page_options ? $page_options['sub_title_color'] : '' ;
                $page_header_color			= $page_options ? $page_options['header_bg_color'] : '' ;
                $page_header_img            = $page_options ? $page_options['header_bg_img'] : '';
                $img_repeat                 = $page_options ? $page_options['img_repeat_opt'] : '';
                $img_positionx              = $page_options ? $page_options['img_position_x'] : '';
                $img_positiony              = $page_options ? $page_options['img_position_y'] : '';
                $enable_img_full            = $page_options ? $page_options['img_full_screen'] : '';
                $page_heder_height          = $page_options ? $page_options['page_header_height'] : '';


                $enable_img_fixed   = '';
                if( $page_options != NULL) {
                    $enable_img_fixed   = ( $page_options['img_fixed'] == 'on' ) ? 'fixed' : 'unset';
                }    

                // Either Page Title or the new page title.
                $page_title = $new_page_title  !== '' ? $new_page_title : single_post_title( '', FALSE );

                if ( has_post_thumbnail( get_queried_object_id() ) ||  $page_header_img  !== '' ) {
                    
                    // Get the Featured Image and the Page extra Image which one exist wil lbe shown on page header.
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                    $image_url = $image[0] ;
                    $image_url = $page_header_img  !== '' ? $page_header_img : $image_url ;
                    
                    // Image full screen option.
                    $img_full_sscreen = $enable_img_full !== '' ? 'cover' : 'Auto';

                    $img_ver_position = $img_positionx !== '' ? 'cover' : 'Auto';
                    $img_hor_position = $img_positiony !== '' ? 'cover' : 'Auto';
                    
                    $img_cont_style = '<style>                                    
                                            
                                            #banner-id {
                                                padding: 0px;
                                                background-image: url('. $image_url .');
                                                background-position: '.$img_positionx.' '.$img_positiony.';
                                                background-repeat: '.$img_repeat .';
                                                background-size: '.$img_full_sscreen.';
                                                background-attachment: '.$enable_img_fixed .';
                                                position: relative;
                                                width: 100%;
                                                color: #fff;
                                                text-transform: capitalize;
                                                height:100%;
                                            }
                                            #banner-id:after{    
                                                background-color: '.$page_header_color.';
                                                opacity: 0.2;
                                                content:"";
                                                height: 100%;
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                width: 100%;
                                            }
                                            
                                        </style>';
                    
                    $img_cont_start = '<div id="banner-id" class="ca-intro ca-intro-background story-bg" data-story-bg="#">';
                    
                    $img_cont_end = '</div>
                                        <!-- end banner-id -->';
                    
                    echo $img_cont_style;
                } // End if has image

                // Get the Page Header height.
                $page_heder_height = $page_heder_height !=='' ? $page_heder_height : '300'; 

                $items_style = '<style>
                                    .page-header {
                                        background-color: '.$page_header_color.';
                                    }
                                    .page-header-holder {
                                        height : '.$page_heder_height.'px;
                                    }
                                    .header-flex-container {
                                        height: 100%;
                                    }    
                                    .page-title h1 {
                                        color: '.$title_color.' ! important;
                                    }
                                    .page-sub-title  {
                                        color: '.$sub_title_color.' ! important; 
                                    }
                                </style>';

            //echo '<tt><pre>'. var_export($page_options, TRUE) .'</pre></tt>';
            ?>

            <header class="page-header">
               <?php echo $img_cont_start; ?>
               <?php echo $items_style; ?>

                <div class="container page-header-holder">
                    <div class="flex-column d-flex header-flex-container justify-content-center text-<?php echo ($title_alignment); ?>">
                        <div class="page-title"><h1><?php echo $page_title; ?></h1></div>
                        <div class="page-sub-title"><h6><?php echo $page_sub_title; ?></h6></div>
                    </div> <!-- end flex-column -->
                </div> <!-- end container align-items-center   -->
                                    
               <?php echo $img_cont_end; ?>
            </header>

        <?php endif; ?>
        
        <?php 
            /*
             * If it is Archive Page and Not Author Page show Arachive title and Descrption .
             */
             if ( is_archive() && ! is_author() ) : ?>
                
                <?php echo $items_style; ?>

                <header class="page-header">
                    <div class="container page-header-holder">
                        <div class="flex-column d-flex header-flex-container justify-content-center text-<?php echo ($title_alignment); ?>">
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="page-sub-title taxonomy-description"><h6>', '</h6></div>' );
                        ?>
                        </div> <!-- end flex-column -->
                    </div> <!-- end container align-items-center   -->                    
                </header><!-- .page-header -->

        <?php endif; ?>
        
        <?php 
            /*
             * If it is Author Page show Author Photo, title and Biography.
             */
             if ( is_author() ) : ?>

                <?php echo $items_style; ?>

                <header class="page-header">
                    <div class="container page-header-holder">
                        <div class="flex-column d-flex header-flex-container justify-content-center text-<?php echo ($title_alignment); ?>">
                        <?php
                            echo get_avatar( $id_or_email, $size, $default, $alt, $args );
                            echo '<span class="page-title">'.__('Author', 'uno').'</span>' ;
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        </div> <!-- end flex-column -->
                    </div> <!-- end container align-items-center   -->
                    
                </header><!-- .page-header -->

        <?php endif; ?>
        
        <?php 
            /*
             * If it is The Blog Page but not Home Page show Title.
             */        
             if ( uno_is_blogpage()  ) : ?>

                <header class="page-header">
                    <div class="container page-header-holder">
                        <div class="flex-column d-flex header-flex-container justify-content-center text-<?php echo ($title_alignment); ?>">
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        </div> <!-- end flex-column -->
                    </div> <!-- end container align-items-center   -->
                </header><!-- .page-header -->

        <?php endif; ?>
        
        <?php 
            /*
             * If it is search resault Page show Resault and Title.
             */        
             if ( is_search() ) : ?>

                <header class="page-header">
                    <div class="container page-header-holder">

                        <div class="flex-column d-flex header-flex-container justify-content-center text-<?php echo ($title_alignment); ?>">
                            <div class="page-title"><h1><?php _e( 'Search Results for:', 'uno' ); ?></h1>
                                <span class="page-sub-title"><h6><?php echo (get_search_query() ); ?></h6></span>
                            </div>
                        </div> <!-- end flex-column -->

                    </div> <!-- end container align-items-center   -->
                </header><!-- .page-header -->


        <?php endif; ?> 
        
<?php }
}
?>
<?php
/** ------------------------------------------------------------------------ *
  * 2 - The BreadCrumbs Navigation Links
 ** ------------------------------------------------------------------------ */
if ( ! function_exists( 'wg_theme_custom_breadcrumbs' ) ) {
    
    function wg_theme_custom_breadcrumbs() {

        $showOnHome     = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter      = '&nbsp / &nbsp'; // delimiter between crumbs
        $home           = __('Home', 'uno'); // text for the 'Home' link
        $showCurrent    = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before         = '<span class="current">'; // tag before the current crumb
        $after          = '</span>'; // tag after the current crumb dd
        
        
        $before_container = '<div class="breadcrumbs-content"> ';
        
        $before_holder = ' <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="breadcrumbs-lay">';
        
        $after_holder = '               </ul>
                                    </div>
                                <!-- / col-md-12 -->
                            </div>
                            <!-- / row -->
                        </div>
                        <!-- / container -->';
        
        $closing_container = '
                        </div>
                        <!-- / breadcrumbs-content -->';
        
        $homeLink = home_url() ;//get_bloginfo('url'); 

        if ( is_home() || is_front_page() ) {
            
            if ($showOnHome == 1) {
                echo $before_container;
                    echo $before_holder;
                        echo '<li id="breadcrumbs-lay__link"><a href="' . $homeLink . '">' . $home . '</a></li>';
                    echo $after_holder;
                echo $closing_container;
            }

        } else {
            
            echo $before_container;
                echo $before_holder;

                    echo '<li id="breadcrumbs-lay__link"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

                    $post_info  = get_post($post);
                    $parent = $post_info ->post_parent;
            
                    if ( is_category() ) {
                      $thisCat = get_category(get_query_var('cat'), false);
                      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
                      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

                    } elseif ( is_search() ) {
                      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

                    } elseif ( is_day() ) {
                      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
                      echo $before . get_the_time('d') . $after;

                    } elseif ( is_month() ) {
                      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                      echo $before . get_the_time('F') . $after;

                    } elseif ( is_year() ) {
                      echo $before . get_the_time('Y') . $after;

                    } elseif ( is_single() && !is_attachment() ) {
                      if ( get_post_type() != 'post' ) {
                        $post_type = get_post_type_object(get_post_type());
                        $slug = $post_type->rewrite;
                        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                      } else {
                        $cat = get_the_category(); $cat = $cat[0];
                        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                        echo $cats;
                        if ($showCurrent == 1) echo $before . get_the_title() . $after;
                      }

                    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                      $post_type = get_post_type_object(get_post_type());
                      echo $before . $post_type->labels->singular_name . $after;

                    } elseif ( is_attachment() ) {
                      $parent = get_post($post->post_parent);
                        
                      $post_info  = get_post($post);
                      $parent = $post_info ->post_parent;
                        
                      $parent_post  = get_post($parent);
                    
                      $post_title = $parent_post-> post_title;
                      
                      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                      if ($showCurrent == 1) echo ' ' . $delimiter1 . ' ' . $before . get_the_title() . $after;

                    } elseif ( is_page() && ! $parent ) {
                      
                      if ($showCurrent == 1) {
                          echo $before . get_the_title() . $after;
                      }
                        
                    } elseif ( is_page() && $parent ) {
                                                
                      $parent_id  = $parent;
                      $breadcrumbs = array();
                      while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                        $parent_id  = $page->post_parent;
                      }
                        
                      $breadcrumbs = array_reverse($breadcrumbs);
                      for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo $breadcrumbs[$i];
                        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
                      }
                      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

                    } elseif ( is_tag() ) {
                      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

                    } elseif ( is_author() ) {
                       global $author;
                      $userdata = get_userdata($author);
                      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

                    } elseif ( is_404() ) {
                        echo $before . 'Error 404' . $after;

                    } 

                    /* if ( is_shop() ) {
                        echo $before . 'shop' . $after;
                    } */

                    if ( get_query_var('paged') ) {
                      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                            echo __('&nbspPage ', 'uno') . ' ' . get_query_var('paged', 'uno');
                      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
                    }

                echo '</li>';
            
            echo $after_holder;
        echo $closing_container;
        }
        
    } // end wg_theme_custom_breadcrumbs()
}










function uno_get_the_excerpt() {

    if ( ! has_excerpt( $post->ID ) ) {    
        
        $trimexcerpt = get_the_content();
        
        $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 110, $more = ' [...]' );
        
        echo "<p>" .$shortexcerpt. "</p>";

        
        $count = str_word_count($shortexcerpt);
 
        if($count >= 110){ 
           
            echo '<a href="<?php the_permalink(); ?>" class="st-more-link text-center text-uppercase"><span>'. _e('Read More here', 'cherry') . '</span></a>';
         }
        
        
        
        
       /* $test =  wp_trim_words( get_the_content(), 55, '...' );
        
        $num_words  = '55';
        $more       = 'read more ';*/
            
        
        //$content = apply_filters( 'wp_trim_words', '(more)', $num_words, $more, get_the_content() );
        
        //echo $test;
        // check for more tag
    /*    if ( preg_match( '/\b(more)\b/i', $test, $matches ) ) {
            $content = 'here';
            $content = apply_filters( 'uno_get_content-more', '' );
        }
        */
    }else {
        $content = apply_filters( 'the_excerpt', get_the_excerpt() );
    }
    //return $content;
    
    
 
}






















