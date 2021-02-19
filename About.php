<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>About</title>

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
                        <img src="img/about.png" alt="logo">
                    </div>
                </div>
                <div class="col-md-6 no-gutters">
                    <div class="rightside">
                        <div class="about">
                            <p>
                                Welcome to our hotel's website. <br>
                                <br>We are so glad you decided to CheckIn.<br>
                                The five-star CheckIn Hotel is a jewel of the modern minimalistic architecture, located in the 
                                strict centre of Prishtina. 
                                We have 70 comfortably equipped rooms which are sure to awe even the most demanding Guests. 
                                The CheckIn Hotel is not merely the building but, above all, its people. We are a team of 
                                professionals, who can organise every event end-to-end.
                                We have many years of experience, extensive conference facilities, as well as technical 
                                and catering equipment, and we will be more than happy to organise your meeting – both in 
                                our building, in a tent at the hotel's patio, as well as in any other place of your choosing.
                                <br>What are you waiting for? Book your room now.
                                Already have an account! Click<a href="Index.php" style="color:gold;"> HERE</a> to sign in.
                            </p>
                      </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'Footer.php'; ?>
    </body>
</html>