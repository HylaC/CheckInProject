<?php
    require 'BusinessLogic/RoomController.php';

    $rooms = new RoomController;

    if(isset($_GET['room_id'])) {
        $room_id = $_GET['room_id'];
    }

    $rooms->deleteRoom($room_id);

    header('Location: Rooms.php');
?>