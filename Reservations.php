<?php
require 'BusinessLogic/RoomController.php';

$rooms = new RoomController;

if(!$_SESSION['userid']){
    header('Location: ./Home.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reservations</title>

        <link rel="stylesheet" href="css/style.css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'Header.php'; ?>
        <main>
            <div class="reservations">
                <select class="select" form="reservationform">
                    <?php foreach ($rooms->seeRooms() as $room): ?>
                        <option value="<?= $room['name']; ?>"><?= $room['name']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <select class="select" form="reservationform">
                    <?php foreach ($rooms->seeRooms() as $room): ?>
                        <option value="<?= $room['size']; ?>"><?= $room['size']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <form class="forms" action="reservations.php" id="reservationform">
                    <input type="date"/><br>
                    <input type="date"/><br>
                </form>
            </div>
        </main>
        <?php include 'Footer.php'; ?>
    </body>
</html>