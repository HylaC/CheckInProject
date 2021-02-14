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
        <style>
            .dashboardpage{
    background-color: #171616;
    padding: 70px 0;
  }
  
  .dashboardpage table tr th ,table tr td {
    color: #ffffff;
  }
  
  .dashboardpage table{
    width: 80%;
    height: 80%;
    margin: 0 auto;
    background-color: rgb(12, 11, 11);
  }
  
  .dashboardpage table, th, td {
    border: 1px solid rgb(245, 217, 96);
    padding: 20px;
  }
  
  
  .dashboard-form{
    font-family: sans-serif;
  }
  
  .dashboard-button{
    width: 100%;
    height: 100%;
    border-radius: 10px;
    border-color: rgb(245, 217, 96);
    background-color: transparent;
    color: white;
    padding: 10px;
    margin: 10px 0;
  }
            </style>

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

