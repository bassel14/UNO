<?php
/**
 * The template part for displaying The TopBar Social Icons
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
/*
$space_class   = $topbar_content_direction == 'r' ? ' no-right-space' : '';*/
if ( $topbar_content_direction != 'r' && $topbar_content_alignment != 'center' ) {
    $space_class = 'no-right-space';
}

/*echo '<tt><pre>'. var_export($topbar_content_alignment, TRUE) .'</pre></tt>';*/
?>
<div class="topbar-socialicons  <?php echo $space_class ?>">
    <ul class="top-list-inline">
        
        <?php if ( ! empty ( $data['top_bar_fb']) ) { ?>
            <li><a href="<?php echo $data['top_bar_fb'] ?>" class="social-icon">
                <i class="fab fa-facebook-square fa-2x"></i>
                </a>
            </li>
        <?php } ?>
        
        <?php if ( ! empty ( $data['top_bar_twitter']) ) { ?>
            <li><a href="#" class="social-icon">
                <i class="fab fa-twitter-square fa-2x"></i></a>
            </li>
        <?php } ?>
        
        <?php if ( ! empty ( $data['top_bar_gplus']) ) { ?>
            <li><a href="#" class="social-icon">
                <i class="fab fa-google-plus-square fa-2x"></i></a>
            </li>
        <?php } ?>
        <?php if ( ! empty ( $data['top_bar_pinterest']) ) { ?>
            <li><a href="#" class="social-icon">
                <i class="fab fa-pinterest-square fa-2x"></i></a>
            </li>
        <?php } ?>
        
        <?php if ( ! empty ( $data['top_bar_youtube']) ) { ?>
            <li><a href="#" class="social-icon">
                <i class="fab fa-youtube-square fa-2x"></i></a>
            </li>
        <?php } ?>
        
        <?php if ( ! empty ( $data['top_bar_instagram']) ) { ?>
            <li><a href="#" class="social-icon">
                <i class="fab fa-instagram fa-2x"></i></a>
            </li>
        <?php } ?>
        
    </ul>
</div>