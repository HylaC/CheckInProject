<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>

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
                        <img src="img/logo.png" alt="logo">
                    </div>
                </div>
                <div class="col-md-6 no-gutters">
                    <div class="rightside">
                        <div class="container" id="container">
                            <div class="form-container sign-in-container">
                                <form action="BusinessLogic/UserController.php" class="forms">
                                    <h1>Sign Up</h1>
                                    <div><input class="input input-field-register has-error has-success" id="name" name="name" type="text" placeholder="First & Last Name"/></div>
                                    <p id="nameError">Please fill in your first & last name!</p>
                                    <div><input class="input input-field-register" id="email" name="email" type="text" placeholder="Email address"/></div>
                                    <p id="emailError">Please fill in your email address!</p>
                                    <div><input class="input input-field-register" id="password" name="password" type="password" placeholder="Password"/></div>
                                    <p id="passError">Please fill in your password!</p><br>
                                    <div class="wrapper">
                                        <button type="submit" id="submit" class="pagebutton input" name="submitted" onclick="return validate(1)">Sign up</button>
                                    </div><br>
                                    <p>Already have an account! Click
                                        <a href="Index.php" target="_blank" style="color:gold;">HERE</a> to sign in.
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