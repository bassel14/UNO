<?php
/**
 * The template part for displaying Footer Social Icons 
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
?>
<?php 
// get the user option if they want to open the link of social icons in new tab window
$target = $data['footer_social_icons_target'];
if ( $target ) { $target = '_blank'; } 
// Get the hover color for social icons if the user add it
$hover_color = 'style="background:#333;"';


$footer_icons_background_color         =  $data['footer_icons_background_color']  ;
$footer_icons_background_hover_color   =  $data['footer_icons_background_hover_color']  ;

//echo '<tt><pre>'. var_export($data['custom_social_link'] , TRUE) .'</pre></tt>';
?>

<ul class="l-list-inline footer-icons">
    <?php if( $data['social_facebook_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_facebook_link']; ?>">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_twitter_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_twitter_link']; ?>">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_googleplus_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_googleplus_link']; ?>">
                <i class="fab fa-google-plus-g"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_pinterest_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_pinterest_link']; ?>">
                <i class="fab fa-pinterest-p"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_instagram_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_instagram_link']; ?>">
                <i class="fab fa-instagram"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_flickr_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_flickr_link']; ?>">
                <i class="fab fa-flickr"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_linkedin_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_linkedin_link']; ?>">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_youtube_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_youtube_link']; ?>">
                  <i class="fab fa-youtube"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_vimeo_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_vimeo_link']; ?>">
                <i class="fab fa-vimeo-v"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_tumblr_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_tumblr_link']; ?>">
                <i class="fab fa-tumblr"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_dribbble_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_dribbble_link']; ?>">
                <i class="fab fa-dribbble"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_digg_link'] ): ?>
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_digg_link']; ?>">
                <i class="fab fa-digg"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_skype_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_skype_link']; ?>">
                <i class="fab fa-skype"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_deviantart_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_deviantart_link']; ?>">
                <i class="fab fa-deviantart"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_yahoo_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_yahoo_link']; ?>">
                <i class="fab fa-yahoo"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_reddit_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_reddit_link']; ?>">
                <i class="fab fa-reddit"></i>
            </a>
        </li>
    <?php endif; ?>

    <!-- Custom Social Icon Section -->
    <?php if( $data['custom_social_icon_image'] ): ?>
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['custom_social_link']; ?>">
                <img src="<?php echo $data['custom_social_icon_image']; ?>" alt="" width="30px" />
            </a>
        </li>
    <?php endif; ?>
    <?php if( $data['social_rss_link'] ): ?>                            
        <li>
            <a target="<?php echo $target; ?>"  href="http://<?php echo $data['social_rss_link']; ?>">
                <i class="fas fa-rss"></i>
            </a>
        </li>
    <?php endif; ?>
</ul>
