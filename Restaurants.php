<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Restaurants</title>

        <link rel="stylesheet" href="css/style.css"/>
 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <?php include 'Header.php'; ?>
        <main>
            <div class="row no-gutters">
                <div class="col-md-6 no-gutters">
                    <div class="leftside">
                        <img src="img/restaurant.png" alt="logo">
                    </div>
                </div>
                <div class="col-md-6 no-gutters">
                    <div class="rightside">
                        <div class="restaurant">
                            <div class="slider">
                                <div class="slider-content active">
                                    <img src="img/photo1.jpg" alt=""/>
                                </div>
                                <div class="slider-content not-active">
                                    <img src="img/photo2.jpg" alt=""/>
                                </div>
                                <div class="slider-content not-active">
                                    <img src="img/photo3.jpg" alt=""/>
                                </div>
                                <div class="slider-content not-active">
                                    <img src="img/photo4.jpg" alt=""/>
                                </div>
                            </div>
                            <div class="paragraph-restaurant">
                            <p><br>
                                Our hotel also has its own restaurant for its clients.
                                We offer a warm atmosphere where the
                                emphasis is on comfort, taste and above all, relaxation
                                and enjoyment. Grilled Strip with Baked Mac n Cheese
                                and Sweet Onion Jam; Angelhair pasta
                                with Shrimp, diced tomatoes, spinach, roasted red peppers
                                are just a few of the special dishes you'll find at your visit here.
                                Let's not forget about drinks. One of our main workers here is
                                a specialist in cocktails. We've also got a wide category of wines
                                to choose from. What are you waiting for? Book your room and
                                visit our restaurant while you're here.
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'Footer.php'; ?>
        <script src="js/main.js"></script>
        <script>
            // SLIDER-i
            var divElements = document.getElementsByClassName('slider-content');
            var sliderIndex = 0;

            document.getElementsByClassName("slider")[0].addEventListener('click', function(event){
                divElements[sliderIndex].classList.remove('active');
                divElements[sliderIndex].classList.add('not-active');

                sliderIndex++;
                if(sliderIndex == divElements.length) sliderIndex = 0;

                divElements[sliderIndex].classList.add('active');
                divElements[sliderIndex].classList.remove('not-active');
            })
        </script>
    </body>
</html>