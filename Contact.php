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
                            <form class="forms" role="form">
                                <div class="form-group"><input class="input input-field-contact" type="text" name="firstname" placeholder="First Name"></div>
                                <div class="form-group"><input class="input input-field-contact" type="text" name="lastname" placeholder="Last Name"></div>
                                <div class="form-group"><input class="input input-field-contact" type="email" name="email" placeholder="Email"></div>
                                <div class="form-group"><textarea class="input input-field-contact" rows="7" cols="7" name="message" placeholder="Message"></textarea></div>
                                <div class="wrapper"><button type="submit" class="pagebutton" name="contactsubmit" onclick="validate(2)">Send Message</button></div>
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