<?php
include_once 'BusinessLogic/DataBaseConfig.php';
include_once 'BusinessLogic/UserMapper.php';
if (isset($_SESSION["role"]) && $_SESSION['role'] == '1') {
    $mapper =  new UserMapper();
    $userList = $mapper->getAllUsers();
} else {
    header("Location: ../Home.php");
}
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>

        <link rel="stylesheet" href="css/style.css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <?php include 'Header.php';?>
            <div class="dashboardpage">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Managment</th>
                    </tr>

                    <?php foreach ($userList as $user) {?>
                    <tr>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php if($user['role'] == 1){
                                echo 'Admin';}
                            else{
                                echo 'User';
                            } ?>
                        </td>
                        <td>
                            <form action="" class="dashboard-form" method="POST">
                                <input type="hidden" name="id" placeholder="Password" value="<?php echo $user['userid']?>"/>
                                <button type="submit" class="dashboard-button" name="submitted">
                                    <?php if($user['role'] == 1){
                                        echo 'Remove Admin';}
                                    else{
                                        echo 'Make Admin';
                                    } ?>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        <?php include 'Footer.php'?>
    </body>
</html>