<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>

        <link rel="stylesheet" href="css/style.css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <?php include 'Header.php'?>
            <div class="dashboardpage">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Managment</th>
                    </tr>

                    <tr>
                        <td>name</td>
                        <td>email</td>
                        <td>role</td>
                        <td>
                            <form action=".BusinessLogic/SignInController.php" class="dashboard-form" method="POST">
                                    <input type="hidden" name="id" placeholder="Password" value="id"/>
                                    <button type="submit" class="dashboard-button" name="submitted"></button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        <?php include 'Footer.php'?>
    </body>
</html>