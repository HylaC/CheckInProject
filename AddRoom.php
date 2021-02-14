<?php
session_start();
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
    </style>
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