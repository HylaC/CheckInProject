<?php
    session_start();
    require_once 'BusinessLogic/RoomController.php';

    $rooms = new RoomController;

    if(isset($_POST['submitted'])) {
        $rooms -> addReservation($_POST);
    }

    if($_SESSION['role']!=0){
        header('Location: ./Home.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reservations</title>

        <link rel="stylesheet" href="css/style.css"/>
        
        <style>
            select{
                border-radius: 20px;
                padding: 8px;
                width: 15%;
            }
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'Header.php'; ?>
        <main>
            <div class="reservations">
                <div style="text-align: center;">
                    <br/>
                    <select class="select" form="reservationform" style="margin-bottom: 10px;">
                        <?php foreach ($rooms->seeRooms() as $room): ?>
                            <option value="<?= $room['name']; ?>"><?= $room['name']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <select class="select" form="reservationform" style="margin-bottom: 10px;">
                        <?php foreach ($rooms->seeRooms() as $room): ?>
                            <option value="<?= $room['size']; ?>"><?= $room['size']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
                <form class="roomform" method="POST" action="" id="reservationform">
                    <input type="date" name="fromdate"/><br>
                    <input type="date" name="until"/><br>
                    <div class="wrapper"><button type="submit" class="pagebutton" name="submitted">Add Reservation</button></div>
                </form>
            </div>
        </main>
        <?php include 'Footer.php'; ?>
    </body>
</html>