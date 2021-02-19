<?php
    session_start();
    require 'BusinessLogic/UserMapper.php';
    $users = new UserMapper();
    
    if($_SESSION['role']!=1){
        header('Location: Index.php');
    }

    if(isset($_POST['submitted'])) {
        $users->makeadmin($_POST);
    }

    $userList = $users->getAllUsers();
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
        <main>
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
                                <input type="hidden" name="userid" placeholder="Password" value="<?php echo $user['userid']?>"/>
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
        </main>
        <?php include 'Footer.php'?>
    </body>
</html>  

