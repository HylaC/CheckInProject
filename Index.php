<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>

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
                        <img src="img/logo.png" class="image" alt="logo">
                    </div>
                </div>
                <div class="col-md-6 no-gutters">
                    <div class="rightside">
                        <div class="container" id="container">
                            <div class="form-container sign-in-container">
                                <form action="" name="login" class="forms" method="post">
                                    <h1>Sign In</h1><br>
                                    <div><input class="input input-field-login" type="text" name="email" placeholder="Email address"/><br></div>
                                    <p id="emailError">Please fill in your email address!</p>
                                    <div><input class="input input-field-login" type="password" name="password" placeholder="Password"/><br></div>
                                    <p id="passError">Please fill in your password!</p><br>
                                    <div class="wrapper">
                                        <button type="submit" id="submit" class="pagebutton input" name="submitted" onclick="return validate(0)">Sign In</button>
                                    </div><br>
                                    <p>Don't have an account? Click
                                        <a href="SignUp.php" target="_blank" style="color:gold;">HERE</a> to sign up.
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'Footer.php'; ?>
        <script src="js/main.js"></script>
    </body>
</html>