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
        <title>Document</title>
    </head>

    <body>
        <?php
        include('adminnav.php');
        ?>
        <div class="container">
            <div class="dashboard">
                <a href="addplace.php">
                    Add Place
                </a>
                <a href="addtrip.php">
                    Add Trip
                </a>
                <a href="viewplaces.php">
                    View Places
                </a>
                <a href="viewtrips.php">
                    View Trips
                </a>
                <a href="viewmessages.php">
                    View Messages
                </a>
            </div>
        </div>
    </body>

    </html>

<?php }
?>