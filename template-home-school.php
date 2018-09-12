<?php
/*
Template Name: Home School
*/
?>
<?php
// Security Check
if ( ! defined( 'ABSPATH' ) ) { 
    exit; 
}

get_header(); 
?>
<div class="main-wrapper">


    <div id="slider-holder">
 
        The Slider Section
        
    </div>
    <!-- end of slider -->

    <section class="about-section">

        <div id="about-container">
        
            <div class="welcom-wraper">
                <div class="welcom-letter">
                  <!--   <div class="extra-wrapper"> -->
                        <h2>Welcome To Montessori</h2>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/montesoryLady.jpg"" alt="" />
                        <p>Who is Montessori? The basic idea in the Montessori philosophy of education is that all children carry within themselves the person they will become.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Mauris ante ligula, facilisis sed ornare eu, lobortis in odio. Praesent convallis urna a lacus interdum ut hendrerit risus congue. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta. Cras ac leo purus. Mauris quis diam velit.</p>
                   <!--  </div> -->
                </div>
            </div>
            
            <div class="about-varity">
                <div class="varity-wraper">  
                    <h2>Music For All Ages</h2>                     
                    <div class="componont-icon">
                        <i class="fas fa-music"></i>
                    </div>
                    <p>The creative music, movement, and dramatics program is an on-going flexible process that integrates itself into the academic program of the International Montessori School.</p>
                </div>
                <div class="varity-wraper">   
                    <h2>Sports for All Ages</h2>                    
                    <div class="componont-icon">   
                        <i class="fas fa-swimmer"></i>
                    </div>
                    <p>Dr. Montessori believed that this the beginning of conscious. It is brought about by the intelligence working in a concentrated way on the impressions given by the senses.</p>
                </div>
                <div class="varity-wraper">     
                    <h2>Language for All Ages</h2>                  
                    <div class="componont-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <p>Language is an important part of the entire Montessori curriculum. Its treatment as a separate subject comes only at the points in which it is necessary to give clarity to the child's mind – that is, to give him or her conscious awareness of language in order that it may be used more effectively.</p>
                </div>
            </div>
        
        </div><!-- End about-container -->
       
    </section> <!-- End of About us Section -->






    <section class="news-section">
        News & Events Section
    </section>
    
    <section class="school-life-section">
        Daily life at School
    </section>
    
    <section class="testimonials-section">
        What Parents Say about us
    </section>
    
    <section class="instagram-section">
        Instagram Section
    </section>



</div>
<!-- end of main-wrapper -->



<?php get_footer(); ?>