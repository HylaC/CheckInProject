<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>

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
                        <img src="img/contact.png" alt="logo">
                    </div>
                </div>
                <div class="col-md-6 no-gutters">
                    <div class="rightside">
                        <div class="contact">
                            <p class="fillform">Ask us anything by filling the form below...</p>
                            <form class="forms" role="form" method="POST" enctype="multipart/form-data">
                                <div><input class="input input-field-contact" type="text" name="firstname" placeholder="First Name"></div>
                                <p id="nameError">Please fill in your first name!</p>
                                <div><input class="input input-field-contact" type="text" name="lastname" placeholder="Last Name"></div>
                                <p id="lastNameError">Please fill in your last name!</p>
                                <div><input class="input input-field-contact" type="text" name="email" placeholder="Email"></div>
                                <p id="emailError">Please fill in your email address!</p>
                                <div><textarea class="input input-field-contact" rows="7" cols="7" name="message" placeholder="Message"></textarea></div>
                                <p id="messageError">Please fill in your message!</p><br>
                                <div class="wrapper"><button type="submit" class="pagebutton" name="contactsubmit" onclick="return validate(2)">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'Footer.php'; ?>
        <script src="js/main.js"></script>
    </body>
</html>