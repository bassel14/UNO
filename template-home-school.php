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

        <div class="about-wrapper">

            <div class="section-header about-header">
                <h2>About US</h2>
                <h4>Montessori School</h4>
            </div>

            <main class="about-us">

                <div class="about-content">
                    <h2>Cosmos Office </h2>
                    <p>Cosmos Tours is a Syrian company for incoming and outgoing tourism, founded in 1995 by Mr. Bassam Dagher. 
                       Giving tourists treasured vacations to countries like Jordan, Holy Land, Lebanon, and Egypt, has been the core of our service since our foundation.
                    </p>                                
                    <div class="btn">   
                        <a class="#" href="#"> read more</a>
                    </div>
                </div> <!-- end about content -->

                <div class="img-holder" ><img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.jpg" /></div>
                
            </main>

            <main class="about-componont">
            
                <div class="componont-item">                          
                    <div class="componont-icon">   
                        <i class="fas fa-users"></i>
                    </div>
                    <h2>Experienced Team</h2>
                    <p>Cosmos Tours team is a well oriented and experinced team, you can be sure they will take carre of you in all your travel days.</p>      
                </div> <!-- end item  -->
                
                <div class="componont-item">                              
                    <div class="componont-icon icon-left">   
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h2>Free Consultations</h2>
                    <p>Cosmos Tours will answer all your questions and will guide you through your travel all the time.</p>
                </div> <!-- end item  -->
                
                <div class="componont-item">
                    <div class="componont-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h2>Quality Service</h2>
                    <p>Cosmos Tours always understand the customer satisfaction for this reason the serivce they provide is considered as high as you can imagin.</p>
                </div> <!-- end item  -->

            </main>


        </div>

    </section> <!-- End of AQbout us Section -->



    <section class="call-to-action">
    
        <div class="container">
                <div class="row">

                <div class="col-md-6">
                    <div class="cta-descrption">
                        Call us now, for your next trip to the History!
                    </div>
                </div> <!-- end of  -->

                <div class="col-md-6 ">
                    <div class="cta-info">
                        <i class="fas fa-phone-square"></i>
                        +963 11 232 1401
                    </div>
                    
                </div> <!-- end of  -->

            </div> <!-- end row -->
        </div> <!-- end container -->

    </section> <!-- End of call to action section -->


    <section class="discover-syria">
    
        <div class="discover-wrapper">

            <div class="section-header discover-header">
                <h2>Discover Syria</h2>
                <h4>Discover Syria the way you never seen it before</h4>
            </div>
            
        <main class="discover">

            <section class="info1">
                <h2>Discover Syria</h2>
                <p>Since dawn of time, Syria has been a crossroads of civilization, though often described as the cradle of civilizations. It has been the bridge connecting the cultures of Eastern Mediterraneans and Fertile Crescent, and the beginning of Silk Road joining West with East..</p>
                <div class="info-link">   
                    <a class="#" href="#"> read more</a>
                </div>

            </section>

            <div class="info-2">
                <h1>Damascus</h1>
            </div>
            
            <figure class="figure1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about1.jpg" class="discover-img" />
            </figure>

            <div class="info2">
                <h1>Aleppo, Lattakia ...</h1>
            </div>

            <figure class="figure2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/palmyra.jpg" class="discover-img" />
            </figure>


            <figure class="figure3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about2.jpg" class="discover-img" />
            </figure>


            <section class="info3">

                    <div class="stat-block">
                        <div class="icon-left">
                            <i class="fas fa-user-circle"></i>
                        </div>                        
                        <div class="stat-number">1200</div>
                        <div class="stat-descrption"> Happy Tourists</div>
                    </div>

                    <div class="stat-block">
                        <div class="icon-left">
                            <i class="far fa-calendar-check"></i>
                        </div>
                        <div class="stat-number">20</div>
                        <div class="stat-descrption">Years of Experience</div>
                    </div>

                    <div class="stat-block">
                        <div class="icon-left">
                            <i class="fas fa-map"></i>
                        </div>
                        <div class="stat-number">5000</div>
                        <div class="stat-descrption">Trips Organised</div>
                    </div>

                    <div class="stat-block">
                        <div class="icon-left">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div class="stat-number">7200</div>
                        <div class="stat-descrption">Delicious Meal</div>
                    </div>


            </section>

        </main>
            <!-- 
            <main class="main-discover">

                <section class="info1">
                    <h2>Discover Syria</h2>
                    <p>Discover Syria the way you never seen it before</p>
                </section>

                <div class="discover-img1"><img src="<?php //echo get_template_directory_uri(); ?>/assets/images/about1.jpg" alt="first image" class="discover-img" /></div>

                <div class="city1">Damascus</div>


                <div class="discover-img2"><img src="<?php //echo get_template_directory_uri(); ?>/assets/images/palmyra.jpg" alt="Second image" class="discover-img" /></div>

                <div class="city2">Mary</div>
                
                <div class="discover-img3"><img src="<?php //echo get_template_directory_uri(); ?>/assets/images/about2.jpg" alt="Third image" class="discover-img"  /></div>

                
                <section class="info2">
                    <h2>The Title</h2>
                    <div>1200 Happy Clients</div>
                    <div>10000 Km Round Syria</div>
                    <div>7200 Delicious Meal</div>
                </section>

                <div class`="discover-img2"><img src="<?php //echo get_template_directory_uri(); ?>/assets/images/maps.jpg" alt="Second image" class="discover-img" /></div>

                <div class="city2">Space3</div>

                <div class`="discover-img2"><img src="<?php //echo get_template_directory_uri(); ?>/assets/images/case-studies.jpg" alt="Second image" class="discover-img" /></div> 

            </main>
            -->

        </div> <!-- end of discover-wrapper -->

    </section> <!-- end of discover-syria section -->

    <section class="programs-section">

        <div class="programs">

            <div class="section-img">

                <div class="section-header programs-descrption">
                    <h2>Our Programs</h2>
                    <h4>Pick from our variety of programs or contact us to make special program that suites you.</h4>
                </div>

                <main class="cards">

                    <div class="card-1">
                        <div class="cards-img-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/damascus-bab_kisan.jpg" alt="first image" />
                        </div>                                
                        <div class="cards-desc-container">
                            <h2>15 days and nights</h2>
                            <p>From the oldist capital in the world to the oldest city in the world, discover Syria like watching historical movi!</p>
                            <ul class="cards-list">
                                <li>Day1: From Airport to Hotel</li>
                                <li>Day2: Old Damascus City</li>
                                <li>Day3: The Castle of Damascus</li>
                            </ul>
                        </div>                                     
                        <div class="cards-button-container">   
                            <a class="#" href="#"> read more</a>
                        </div>
                    </div> <!-- end of card-1 -->

                    <div class="card-2">
                        <div class="cards-img-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/palmyra.jpg" alt="first image" />
                        </div>                                
                        <div class="cards-desc-container">
                            <h2>The Desert Tour</h2>
                            <p>Palmyra, Dura Europos, Philipapolis, Qalb Lozeh! see the desert through the eyes of the history. </p>
                            <ul class="cards-list">
                                <li>Day1: From Airport to Hotel</li>
                                <li>Day2: Palmyra Hotel</li>
                                <li>Day3: Palmyra Theater,and palace.</li>
                            </ul>
                        </div>                                     
                        <div class="cards-button-container">   
                            <a class="#" href="#"> read more</a>
                        </div>
                    </div> <!-- end of card-2 -->

                    <div class="card-3">
                        <div class="cards-img-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ancient-table.jpg" alt="first image" />
                        </div>                                
                        <div class="cards-desc-container">
                            <h2>The Path to Lost Cities</h2>
                            <p>Ebla, Mari, Ugarit are all known as the capitals of old kingdoms, but what about the lost cities inside those kingdom?!!</p>
                            <ul class="cards-list">
                                <li>Day1: From Airport to Hotel</li>
                                <li>Day2: Visit Ebal & Tell Mardikh.</li>
                                <li>Day3: check the 7 lost cities in Edlib.</li>
                            </ul>
                        </div>                                     
                        <div class="cards-button-container">   
                            <a class="#" href="#"> read more</a>
                        </div>
                    </div> <!-- end of card-3 -->

                </main>
                                    
            </div> <!-- end section-img -->

        </div> <!-- end programs -->

    </section>



</div>
<!-- end of main-wrapper -->



<?php get_footer(); ?>