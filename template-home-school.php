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
 
        
        <img id="si_1" src="<?php echo get_template_directory_uri(); ?>/assets/images/slider/1-2.jpg" alt="" />
        
    </div>
    <!-- end of slider -->

    <section class="about-section">

        <div class="container-fluid" id="about-container">
        
            <div class="row">
            
                <div class="col-sm-12 col-xl-4 welcom-wraper">
                    <div class="welcom-letter">
                        <h2>Welcome To Montessori</h2>
                        <div class="lady-img">
                            <figure class="alignleft">
                                <img class="small-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/montesoryLady.jpg"" alt="" />
                            </figure>
                        
                        </div>
                        <p>Who is Montessori? The basic idea in the Montessori philosophy of education is that all children carry within themselves the person they will become.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. nisi lorem egestas odio, ultrices nec congue eget.</p>
                    </div>
                </div>
                
                <div class="col-sm-12 col-xl-8 about-varity">
                    
                    <div class="container">
                        <div class="row">

                            <main class="about-componont-type2">
                            
                                <div class="componont-item-type2">               
                                    <div class="componont-icon">
                                        <i class="fas fa-music"></i>
                                    </div>                                
                                    <h2>Music for All Ages</h2> 
                                    <p>The creative music, movement, and dramatics program is an on-going flexible process that integrates itself into the academic program of the International Montessori School.</p>     
                                </div> <!-- end item  -->
                                
                                <div class="componont-item-type2">                       
                                    <div class="componont-icon">   
                                        <i class="fas fa-swimmer"></i>
                                    </div>                            
                                    <h2>Sports for All Ages</h2> 
                                    <p>Dr. Montessori believed that this the beginning of conscious. It is brought about by the intelligence working in a concentrated way on the impressions given by the senses.</p>
                                </div> <!-- end item  -->
                                
                                <div class="componont-item-type2">               
                                    <div class="componont-icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>    
                                    <h2>Language for All Ages</h2>  
                                    <p>Language is an important part of the entire Montessori curriculum. Its treatment as a separate subject comes only at the points in which it is necessary to give clarity to the child's mind – that is, to give
                                        him or her conscious awareness of language in order that it may be used more effectively.</p>
                                </div> <!-- end item  -->

                            </main>

                        </div> <!-- end row -->
                    </div> <!-- end container -->

            </div> <!-- end about-varity -->           
        
        </div><!-- End about-container -->
       
    </section> <!-- End of About us Section -->


    <section class="programs-section">

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-header">
                        <div class="section-title">
                            <h2>Our Programs</h2>
                        </div>
                        <div class="section-sub-title">
                            <p>Toddlers, Pre-School & Elementry programs</p>
                        </div>
                    </div>
                </div><!--  End Col12 -->
            </div> <!-- End row -->
            
        </div> <!-- End container -->

        <main class="main-cards-type-4">

            <div class="card-1">
                <div class="card-wrapper no-top-margin"> 
                    <div class="cards-img-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/toddler_img.jpg" alt="first image" />
                    </div>                                
                    <div class="cards-desc-container">
                        <h2><a href="#">Toddlers</a></h2>
                        <p>Lommodo ligula eget dolor. Aenean massa. Cum sociis que penatibus et magnis dis parturient montes lorem, nascetur ridiculus mus. Donec…</p>
                    </div> 
                </div>
            </div> <!-- end of card-1 -->                    

            <div class="card-2">
                <div class="card-wrapper no-top-margin"> 
                    <div class="cards-img-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pre-school.jpg" alt="second image" />
                    </div>                                
                    <div class="cards-desc-container">
                        <h2><a href="#">PRESCHOOLERS</a></h2>
                        <p>Lommodo ligula eget dolor. Aenean massa. Cum sociis que penatibus et magnis dis parturient montes lorem, nascetur ridiculus mus. Donec…</p>
                    </div> 
                </div>
            </div> <!-- end of card-2 -->                   

            <div class="card-3">
                <div class="card-wrapper no-top-margin"> 
                    <div class="cards-img-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pre-k.jpg" alt="third image" />
                    </div>                                
                    <div class="cards-desc-container">
                        <h2><a href="#">PRE-K</a></h2>
                        <p>Lommodo ligula eget dolor. Aenean massa. Cum sociis que penatibus et magnis dis parturient montes lorem, nascetur ridiculus mus. Donec…</p>
                    </div> 
                </div>
            </div> <!-- end of card-2 -->                   

            <div class="card-4">
                <div class="card-wrapper no-top-margin"> 
                    <div class="cards-img-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/elementry.jpg" alt="fourth image" />
                    </div>                                
                    <div class="cards-desc-container">
                        <h2><a href="#">Elementry</a></h2>
                        <p>Lommodo ligula eget dolor. Aenean massa. Cum sociis que penatibus et magnis dis parturient montes lorem, nascetur ridiculus mus. Donec…</p>
                    </div> 
                </div>
            </div> <!-- end of card-2 --> 

        </main>


        <main class="main-cards-type-3">
            
            <div class="card-1 card-type2">
                <div class="card-wrapper"> 
                    <div class="card-title">
                        <h2>School Announcements</h2>
                    </div>
                    <div class="cards-desc-container">
                        <ul class="cards-list type-colored  color-red">
                            <li>
                                <span class="tribe-event-date-start">February 8, 2018</span>    
                                <span class="text-right"><a href="#">Parents Meetings</a></span>   
                            </li>
                            <li>
                                <span class="tribe-event-date-start">February 8, 2018</span>    
                                <span class="text-right"><a href="#">first payment close up</a></span>   
                            </li>
                            <li>
                                <span class="tribe-event-date-start">February 8, 2018</span>    
                                <span class="text-right"><a href="#">The second meeting </a></span>   
                            </li>
                            <li>
                                <span class="tribe-event-date-start">February 8, 2018</span>    
                                <span class="text-right"><a href="#">second payment close up</a></span>   
                            </li>
                            <li>
                                <div class="card-info"><a href="#">Provides opportunities for the child to explore »</a></div>
                            </li>
                        </ul>
                    </div>  
                </div>
            </div> <!-- end of card-3 -->  

            <div class="card-2 card-type2">
                <div class="card-wrapper"> 
                    <div class="card-title">
                        <h2>Working hours</h2>
                    </div>
                    <div class="cards-desc-container">
                        <ul class="cards-list type-colored color-green">
                            <li>
                                <span class="text-left">8.00 - 2.00</span>
                                <span class="text-right">Sun-Wed</span>   
                            </li>
                            <li>
                                <span class="text-left">8.00 - 12.00</span>
                                <span class="text-right">Thu</span>   
                            </li>
                            <li>
                                <span class="text-left">10.00 - 2.00</span>
                                <span class="text-right">Sat</span>   
                            </li>
                            <li>
                                <span class="text-left">10:40 - 11:20</span>
                                <span class="text-right">Holidays </span>
                            </li>
                            <li>
                                <div class="card-info"><a href="#">Provides opportunities for the child to explore »</a></div>
                            </li>
                        </ul>
                    </div>  
                </div>
            </div> <!-- end of card-3 -->

            <div class="card-3 card-type2">
                <div class="card-wrapper"> 
                    <div class="card-title">
                        <h2>DAILY PROGRAMS</h2>
                    </div>
                    <div class="cards-desc-container">
                        <ul class="cards-list type-colored  color-blue">
                            <li>
                                <span class="text-left">7.00 - 7.30</span>   
                                <span class="text-right">Flag Rising</span>
                            </li>
                            <li>
                                <span class="text-left">8.00 - 9.30</span>   
                                <span class="text-right">First Lesson</span>
                            </li>
                            <li>
                                <span class="text-left">9.30 - 10.00</span>   
                                <span class="text-right">First Snack</span>
                            </li>
                            <li>
                                <span class="text-left">10.00 - 10.30</span>
                                <span class="text-right">Outdoor Play</span>
                            </li>
                            <li>
                                <div class="card-info"><a href="#">Provides opportunities for the child to explore »</a></div>
                            </li>
                        </ul>
                    </div>  
                </div>
            </div> <!-- end of card-3 -->

        </main>

        <div class="spacer-content"></div>

        </section> <!-- End programs-section -->



    <section class="new-events-section">

        <div class="container-fluid img-bg">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="sep-wrapper">
                                <h2>Montessori News & Events</h2>
                                <div class="sep-custom-link">
                                    <a href="#">See all our news and events</a>
                                </div>
                            </div> <!-- end sep-wrapper -->
                        </div>
                    </div>
                </div>
            </div>

        </div>  <!-- End img-bg -->

        <div class="container1">
            <div class="row1">
                <div class="col-sm-81">

                    <main class="cards">

                        <div class="card-1">
                            <div class="card-wrapper no-top-margin"> 
                                <div class="cards-img-container">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post1.jpg" alt="first image" />
                                </div>                                
                                <div class="cards-desc-container extra-top-margin card-color-bg">
                                    <h2><a href="#">Mathmatic and Phisics class</a></h2>
                                    <div class="card-date"><span class="tribe-event-date-start">Septemper 10, 2018</span></div>  
                                    <p>Lommodo ligula eget dolor. Aenean massa. Cum sociis que penatibus et magnis dis parturient montes lorem, nascetur ridiculus mus. Donec…</p>
                                </div> 
                            </div>
                        </div> <!-- end of card-1 -->                    

                        <div class="card-2">
                            <div class="card-wrapper no-top-margin"> 
                                <div class="cards-img-container">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post2.jpg" alt="first image" />
                                </div>                                
                                <div class="cards-desc-container extra-top-margin card-color-bg">
                                    <h2><a href="#">Haidi and friends return to School</a></h2>
                                    <div class="card-date"><span class="tribe-event-date-start">Septemper 8, 2018</span></div>  
                                    <p>Lommodo ligula eget dolor. Aenean massa. Cum sociis que penatibus et magnis dis parturient montes lorem, nascetur ridiculus mus. Donec…</p>
                                </div> 
                            </div>
                        </div> <!-- end of card-2 --> 

                        <div class="card-3">
                            <div class="card-wrapper extra-car-top-margin card-color-bg-no-margin"> 
                                <div class="card-title">
                                    <h2>Events Calendar</h2>
                                    <a href="#">See all upcoming events</a>
                                </div>
                                <div class="cards-desc-container">
                                    <ul class="cards-list">
                                        <li>
                                            <div class="card-date"><span class="tribe-event-date-start">February 8, 2018</span></div>    
                                            <div class="card-info"><a href="#">Board Meeting »</a></div>
                                        </li>
                                        <li>
                                            <div class="card-date"><span class="tribe-event-date-start">February 8, 2019</span></div>    
                                            <div class="card-info"><a href="#">Most part fantastic faculty members for students »</a></div></li>
                                        <li>
                                            <div class="card-date"><span class="tribe-event-date-start">February 8, 2019</span></div>    
                                            <div class="card-info"><a href="#">Advice: The future of Startups without Support »</a></div>
                                        </li>
                                    </ul>
                                </div>  
                            </div>
                        </div> <!-- end of card-3 -->

                    </main>

                </div>

                <div class="col-sm-41">

                </div>

            </div>

        </div>

    </section> <!-- End News Events Section -->







</div>
<!-- end of main-wrapper -->



<?php get_footer(); ?>