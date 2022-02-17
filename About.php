<?php
include "nav.php";
?>
<!doctype html>
<html>
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="aos-by-red.css">
 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
 <link rel="stylesheet" href="css/about.css">
</head>
<body>
 
    <div id="particles-js" class="topbody">
        <script src="js/particles.js"></script>
        <script src="js/app.js"></script>
            <header class = "topheader">
                <div class = "sizing">  </div>
                <div class = "head-title">
                    <h1>About</h1>
                    <p class="textanimation">Education Unlocked</p>
                    <?php
                        echo "Our mission is to establish free online education for all through this commuinty" ;
                    ?>
                </div>
            </header>
    </div>
 
    <script src="js/readmore.js"></script>

    <div class= "midbody">
        <div class = "moto" data-aos="fade-up" data-aos-duration="1000" data-aos-once="false">
            <h1 class="revealUp">What's our moto?</h1>   
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6" data-aos="fade-right" data-aos-duration="1000" data-aos-once="false">
                <img src="images/randomguy.jpg" width="100%">
            </div>
                <div class="col-sm-8 col-md-3" data-aos="fade-left" data-aos-duration="1000" data-aos-once="false">
                    <h3>Learning for All</h3>
                    <p>The main aim of our project is to give free education as there are lots of people who can’t afford the expenses of study. But they want to learn. They have the curiosity to know more. This website is for them. This website presents free services for them to learn more. Here students can ask any questions they have in their minds, they can access free videos of any courses provided by the teachers, they can attend live classes. 
                    </p>
                    <button id ="more" onclick="myFunction()">Read More</button>
                 </div>
        </div> 
        
        <div id="moreDIV" style="display:none" >
            <p>We took the initiative to make this website to provide free education. We are mainly influenced by StackOverflow and 10-minute school. Our main goal is to provide students free education which will benefit them in the long run of life.
            <br>Our world-class Free Learning website aims to make learning, engaging, personalized and effective. We want to revolutionize the way Bangladesh learns today! In our dream project, we want to create an extra crystal of specialization, a large volume of knowledge.
             Mainly we emphasize the importance of freedom in education here.</p>
             <button id ="less" onclick="myFunction()">Read Less</button>
        </div>
    </div>
    
    <div class="getintouch">
        <div class = "moto" data-aos="fade-up" data-aos-duration="1000" data-aos-once="false">
            <h1>Get in touch</h1>
        </div>
        <div class="row">
            <div class="col-sm-3" data-aos="fade-right" data-aos-duration="1000" data-aos-once="false">
                <img src="images/contact.jpg" width="100%">
            </div>
                <div class="col-sm-3"data-aos="fade-right" data-aos-duration="1000" data-aos-once="false">
                    <a  href="#" class="textanimation2">Contuct Us</a>
                    <p>Get in touch with our Education Unlocked team or leave us a comment about your visit or the website</p>
                 </div>
            <div class="col-sm-3"  data-aos="fade-left" data-aos-duration="1000" data-aos-once="false">
                <img src="images/ques.jpg" width="100%">
            </div>
            <div class="col-sm-3"data-aos="fade-left" data-aos-duration="1000" data-aos-once="false">
                <a  href="#" class="textanimation3">Frequently asked questions</a>
                <p>Find answers to the most commonly asked questions including about our services and information</p>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 3000,
        once: true,
      });
    </script>
</body>
</html>