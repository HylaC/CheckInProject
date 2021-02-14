<?php
    require_once 'BusinessLogic/RoomController.php';

    $rooms = new RoomController;
    

    if(isset($_POST['submitted'])) {
        $rooms -> addRooms($_POST);
     }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>AddRoom</title>

        <link rel="stylesheet" href="css/style.css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'Header.php'; ?>
        <main>
            <div class="rooms">
                <form action="" class="roomform" method="POST">
                    <input required name="name" type="text" placeholder="Name" /><br>
                    <input required name="size" type="text" placeholder="Size" /><br>
                    <div class="wrapper"><button type="submit" class="pagebutton" name="submitted">Add Room</button></div>
                </form>
            </div>
        </main>
        <?php include 'Footer.php'; ?>
    </body>
</html>