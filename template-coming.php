<?php
/*
Template Name: Home Coming Soon
*/
?>
<?php
// Security Check
if ( ! defined( 'ABSPATH' ) ) { 
    exit; 
}

//get_header(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Coming Soon</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .bgimg {
            background: url(<?php echo get_template_directory_uri(); ?>/assets/images/car.jpg);
            height: 100%;
            background-position: center;
            background-size: cover;
            position: relative;
            color: #fff;
            font-family: monospace;
        }

        .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        h1 {
            font-size: 40px;
            letter-spacing: 30px;
            font-weight: 100;
        }

        #demo {
            font-weight: lighter;
            word-spacing: 20px;
        }

        hr {
            margin: auto;
            width: 80%;
            border: 1.5px solid #fff;
        }
    </style>

    
</head>

<body>
    
    
    <div class="bgimg">
        <div class="middle">
        
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="school log"/>
        <h1>Coming Soon</h1>
        
        <hr>
            
            <p id="demo" style="font-size: 30px"></p>
            
            
        </div>
    </div>
    
    
    
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jan 1, 2019 00:00:00").getTime();    
        
        // Update the count down every 1 second
        var countDownfunction = setInterval( function() {   
            
        // Get todays date and time
            var now = new Date().getTime();
            
        // Find the distance between now and the count down date
            var distance = countDownDate - now;
            
        // Time calculation for days, hours, minutes and seconds
            var days = Math.floor((distance / (1000 * 60 * 60 * 24)));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60 )) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60 )) / 1000 );
            
        // Output the result in an element with id="demo"    
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
            
        // If the count down is over, write some text    
            if (distance < 0) {
                clearInterval(countDownfunction);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }        
        }, 1000);
    
    </script>
    
    
</body>

</html>

<?php //get_footer(); ?>