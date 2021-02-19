<?php
    //session_start();
?>
<header>
    <div class="container">
        <nav>
            <ul>
                <?php
                    if(isset($_SESSION["role"]) && $_SESSION['role'] == '1') {
                ?>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="Dashboard.php">Dashboard</a></li>
                    <li><a href="Rooms.php">ROOMS</a></li>
                <?php } ?>

                <?php
                    if(isset($_SESSION["role"]) && $_SESSION['role'] == '0') {
                ?>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="Reservations.php">RESERVATIONS</a></li>
                <?php } ?>
                    
                <li><a href="Contact.php">CONTACT</a></li>
                <li><a href="Restaurants.php">RESTAURANTS</a></li>
                <li><a href="About.php">ABOUT</a></li>
                
                <?php if(isset($_SESSION['role'])){?>
                    <li><a href="SignOut.php">SIGN OUT</a></li>
                <?php }?>
            </ul>
        </nav>
    </div>
</header>