<?php
/**
 * The template part for displaying The TopBar Contact Information
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

/* Get The Contact Information */
$address        = $data['top_bar_address'];
$phone_num      = $data['top_bar_phone'];
$email          = $data['top_bar_email'];
$address_info   = $data['top_bar_info'];

$contact_class   = $topbar_content_direction == 'r' ? ' no-right-space' : '';

/*echo '<tt><pre>'. var_export($topbar_content_alignment, TRUE) .'</pre></tt>';*/
?>
<div class="topbar-contact <?php echo $contact_class ?>">
   
    <ul class="quickinfo-header <?php echo $contact_align_type; ?>">
        
        <?php if ( ! empty ($address) ) { ?>
        <li>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span><?php echo $address; ?></span>
        </li>
        <?php } ?>
        
        <?php if ( ! empty ($phone_num) ){ ?>
        <li>
            <i class="fa fa-phone-square fa-lg" aria-hidden="true"></i>
            <span><?php echo $phone_num; ?></span>
        </li>
        <?php } ?>
        
        <?php if ( ! empty ($email) ){ ?>
        <li>
            <a href="#">
                <i class="fa fa-envelope-square" aria-hidden="true"></i>
                <span><?php echo $email;  ?></span>
            </a>
        </li>
        <?php } ?>
        
        <?php if ( ! empty ($address_info) ){ ?>
        <li>
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span><?php echo $address_info; ?></span>
        </li>
        <?php } ?>
        
    </ul>
</div>