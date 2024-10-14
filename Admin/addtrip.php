<?php
require('../conn.php');
session_start();
if (!isset($_SESSION['admin'])) {
    echo "Please login as an admin";
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/adminnav.css" />
        <link rel="stylesheet" href="css/admin.css" />
        <link rel="stylesheet" href="css/login.css">
        <title>Add Trip</title>
    </head>

    <body>
        <?php
        include('adminnav.php');
        
        if (isset($_POST['addtrip'])) {
            $tname = htmlspecialchars($_POST['tname']);
            $tdesc = htmlspecialchars($_POST['tdesc']);
            $timgs = htmlspecialchars($_POST['timgs']);

                $insertQuery = "INSERT INTO `trips` (`tname`,`tdesc`,`timgs`) VALUES ('$tname','$tdesc','$timgs')";
                $insertDone = mysqli_query($conn, $insertQuery);
                if ($insertDone) { ?>
                    <div class="success-message">
                        <div class="done">
                            <h1>Trip Added Successfully</h1>
                            <a href="addtrip.php">Confirm</a>
                        </div>
                    </div>
        <?php }
            
        }
        ?>
        <section class="signContainer addTripContainer">
            <img src="../Images/Home/bg3.jpg" alt="" />
            <div class="formContainer">
                <form method="post">

                    <h1>Add Trip</h1>

                    <input required type="text" placeholder="Trip Name" name="tname" />
                    <textarea required type="text" placeholder="Trip Description" name="tdesc"></textarea>
                    <textarea required type="text" placeholder="Trip Images" name="timgs"></textarea>
                    <input type="submit" value="Add Trip" name="addtrip">
                </form>
            </div>
        </section>

        
    </body>

    </html>
<?php

}
?>