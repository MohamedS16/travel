<?php
require('../conn.php');
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a random token
}
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
        <title>Update Trip</title>
    </head>

    <body>
        <?php
        include('adminnav.php');
        $tripId = $_GET['trip'];
        $selectQuery1 = "SELECT * FROM `trips` WHERE `tid` = '$tripId'";
        $selectDone1 = mysqli_query($conn, $selectQuery1);
        $trip = mysqli_fetch_assoc($selectDone1);
        if (isset($_POST['updatetrip'])) {

            if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die('CSRF token mismatch');
            }

            $tname = htmlspecialchars($_POST['tname']);
            $tdesc = htmlspecialchars($_POST['tdesc']);
            $timgs = htmlspecialchars($_POST['timg']);
            $errors = [];
            if ($tname === "" || $tdesc === "" || $timgs === "") {
                $errors['triperror'] = "Inputs are required";
            } else {
                
                $updateQuery = "UPDATE `trips` SET `tname` = '$tname' , `tdesc` = '$tdesc' , `timgs` = '$timgs'WHERE `tid` = '$tripId'";
                $updateDone = mysqli_query($conn, $updateQuery);
                if ($updateDone) { ?>
                    <div class="success-message">
                        <div class="done">
                            <h1>Trip Updated Successfully</h1>
                            <a href="viewtrips.php">Confirm</a>
                        </div>
                    </div>
        <?php }
            }
        }
        ?>
        <section class="signContainer">
            <img src="<?php echo $oldTripImages[0]; ?>" alt="" />
            <div class="formContainer">
                <form method="post" enctype="multipart/form-data" style="padding: 40px ; margin-top : 50px">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                    <h1>Update Trip (<?php echo $trip['tname']; ?>)</h1>
                    <input type="text" placeholder="Trip Name" name="tname" value="<?php if (isset($trip['tname'])) {
                                                                                        echo $trip['tname'];
                                                                                    } ?>" />

                    <textarea type="text" placeholder="Trip Description" name="tdesc" ><?php if (isset($trip['tdesc'])) {
                                                                                                echo $trip['tdesc'];
                                                                                            } ?></textarea>
                    <textarea type="text" name="timg" ><?php if (isset($trip['timgs'])) {
                                                                                                echo $trip['timgs'];
                                                                                            } ?></textarea>
                    <input type="submit" value="Update Trip" name="updatetrip">
                </form>
            </div>
        </section>
    </body>

    </html>

<?php }
?>