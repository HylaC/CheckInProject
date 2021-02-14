<?php
    require_once 'BusinessLogic/RoomController.php';
    $rooms=new RoomController;
    if(isset($_GET['room_id'])) {
        $room_id = $_GET['room_id'];
    }

    $selectedRoom = $rooms->editRooms($room_id);

    if(isset($_POST['submitted'])) {
        $rooms->updateRooms($room_id, $_POST);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EditRoom</title>

        <link rel="stylesheet" href="css/style.css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'Header.php'; ?>
        <main>
            <div class="rooms">
                <form action="" class="roomform" method="POST">
                    <input required name="name" type="text" value="<?php echo $selectedRoom['name']; ?>"/><br>
                    <input required name="size" type="text"value="<?php echo $selectedRoom['size']; ?>" /><br>
                    <div class="wrapper"><button type="submit" class="pagebutton" name="submitted">Edit Room</button></div>
                </form>
            </div>
        </main>
        <?php include 'Footer.php'; ?>
    </body>
</html>