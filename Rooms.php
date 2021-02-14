<?php
require 'BusinessLogic/RoomController.php';

    $rooms = new RoomController;
    
    if(!$_SESSION['isadmin']){
        header('Location: ./Home.php');
    }

    if(isset($_GET['submitted'])) {
        $rooms -> editRooms($_GET);
    }
    if(isset($_GET['submitted'])) {

        if(isset($_GET['room_id'])) {
            $room_id = $_GET['room_id'];
        }
        $rooms -> deleteRoom($room_id);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rooms</title>

        <link rel="stylesheet" href="css/style.css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'Header.php'; ?>
        <main>
            <div class="rooms">
                <div class="wrapper">
                    <button class="pagebutton"><a href="addroom.php">Add a room</a></button>
                </div>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Options</th>
                    </tr>
                    <?php foreach ($rooms->seeRooms() as $rooms) {?>
                    <tr>
                        <td><?php echo $rooms['name'] ?></td>
                        <td><?php echo $rooms['size'] ?></td>
                        <td>
                            <form action="editrooms.php" method="GET">
                                <input type="hidden" name="room_id"  value="<?= $rooms['room_id']?>"  />
                                <button type="submit" class="dashboard-button" name="edit">Edit</button>
                            </form>
                            <form action="deleteroom.php" method="GET">
                                <input type="hidden" name="room_id"  value="<?= $rooms['room_id']?>"  />
                                <button type="submit" class="dashboard-button" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </main>
        <?php include 'Footer.php'; ?>
    </body>
</html>