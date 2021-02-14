<?php
session_start();
require 'BusinessLogic/RoomController.php';

    $rooms = new RoomController;
    
    if(!$_SESSION['role']){
        header('Location: ./Index.php');
    }

    if(isset($_GET['edit'])) {
        $rooms -> editRooms($_GET);
    }
    if(isset($_GET['delete'])) {

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
<style>
/* rooms page */

.rooms{
    padding: 40px;
    color: white;
    background-color: #171616;
  }
  
  .wrapper {
    text-align: center;
  }
  
  .roomform{
      color:#fff;
      display: flex;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }
    .roomform input {
      margin: auto;
      border-radius: 20px;
      background-color: #eee;
      padding: 12px 15px;
    }
    .roomform label{
      display: block;
    }
    .roomform input[type="text"], .roomforms textarea{
      border-radius: 20px;
      padding: 8px;
      width: 60%;
      align-content: center;
    }
    
    .rooms table tr th ,table tr td {
      color: #ffffff;
    }
    
    .rooms table{
      width: 80%;
      height: 80%;
      margin: 50px auto;
      background-color: rgb(12, 11, 11);
    }
    
    .rooms table, th, td {
      border: 1px solid rgb(245, 217, 96);
      padding: 20px;
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
                            <form action="editroom.php" method="GET">
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