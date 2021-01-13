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
                                <form action="" class="forms">
                                    <h1>Sign Up</h1>
                                    <input class="input input-field-register" required name="name" type="text" placeholder="First & Last Name"/><br>
                                    <input class="input input-field-register" required name="email" type="email" placeholder="Email address"/><br>
                                    <input class="input input-field-register" required name="password" type="password" placeholder="Password"/><br>
                                    <div class="wrapper">
                                        <button type="submit" id="submit" class="pagebutton input" name="submitted" onclick="validate(1)">Sign up</button>
                                    </div>
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