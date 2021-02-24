<?php
    session_start();
    require 'BusinessLogic/RoomController.php';
    require 'BusinessLogic/UserMapper.php';
    $users = new UserMapper();
    
    if($_SESSION['role']!=1){
        header('Location: Index.php');
    }

    if(isset($_POST['submitted'])) {
        $users->makeadmin($_POST);
    }

    $userList = $users->getAllUsers();

    $rooms= new RoomController();
    $reservationList = $rooms->seeReservations();

    if(isset($_GET['delete'])) {
        if(isset($_GET['reservation_id'])) {
          $reservation_id = $_GET['reservation_id'];
        }
        $rooms -> deleteReservation($reservation_id);
    }
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
                </table><br>

                <table>
                    <tr>
                        <th>Room Name</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Managment</th>
                    </tr>

                    <?php foreach ($reservationList as $rooms) {?>
                    <tr>
                        <td><?php echo 'Room name'; ?></td>
                        <td><?php echo $rooms['fromdate'] ?></td>
                        <td><?php echo $rooms['until'] ?></td>
                        <td> 
                            <form action="" method="GET">
                                <input type="hidden" name="reservation_id"  value="<?= $rooms['reservation_id']?>"  />
                                <button type="submit" class="dashboard-button" name="delete">Delete</button>
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

