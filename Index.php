<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>

        <link rel="stylesheet" href="css/style.css"/>

    </head>
    <body>
        <?php include 'Header.php'; ?>
        <div class="flex-wrapper">
            <main class="content-wrapper">
                <div class="leftside">
                    <img src="img/logo.png" class="image" alt="logo" width="0px">
                </div>
                <div class="rightside">
                    <div class="container" id="container">
                        <div class="form-container sign-in-container">
                            <form action="BusinessLogic/UserController.php" name="login" class="forms" method="POST"> <!--action -> Linku per php file-in te cilit ia dergojme (redirect) formen pasi behet submit.-->
                                <h1>Sign In</h1><br>
                                <div><input class="input input-field-login" type="text" name="email" placeholder="Email address"/><br></div>
                                <p id="emailError">Please fill in your email address!</p>
                                <div><input class="input input-field-login" type="password" name="password" placeholder="Password"/><br></div>
                                <p id="passError">Please fill in your password!</p><br>
                                <div class="wrapper">
                                    <button type="submit" id="submit" class="pagebutton input" name="signin-submitted" onclick="return validate(0)">Sign In</button>
                                </div><br>
                                <p>Don't have an account? Click
                                    <a href="SignUp.php" style="color:gold;">HERE</a> to sign up.
                                </p>
                            </form>
                        </div>     
                    </div>
                </div>
            </main>
        </div>
        <?php include 'Footer.php'; ?>
        <script src="js/main.js"></script>
    </body>
</html>