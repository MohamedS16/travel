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
        <title>Update Trip</title>
    </head>

    <body>
        <?php
        include('adminnav.php');
        $tripId = $_GET['trip'];
        $selectQuery1 = "SELECT * FROM `trips` WHERE `tid` = '$tripId'";
        $selectDone1 = mysqli_query($conn, $selectQuery1);
        $trip = mysqli_fetch_assoc($selectDone1);
        $oldTripImages = json_decode($trip['timgs']);
        $selectPlaces = "SELECT * FROM `places`";
        $selectPlacesDone = mysqli_query($conn, $selectPlaces);
        $places = mysqli_fetch_all($selectPlacesDone);
        if (isset($_POST['updatetrip'])) {
            $tname = htmlspecialchars($_POST['tname']);
            $tprice = htmlspecialchars($_POST['tprice']);
            $tcat = htmlspecialchars($_POST['tcat']);
            $tdesc = htmlspecialchars($_POST['tdesc']);
            $tguide = htmlspecialchars($_POST['tguide']);
            $tplace = $_POST['place'];
            $tdate = $_POST['tdate'];
            $timgs = $_FILES['timg'];
            $errors = [];
            $tripImages = [];
            if ($tname === "" && $tprice === "" && $tcat === "" && $tdesc === "" && $tguide === "" && $tdate === "") {
                $errors['triperror'] = "Inputs are required";
            } else {
                for ($i = 0; $i < count($timgs['name']); $i++) {
                    $tmp = $timgs['tmp_name'][$i];
                    $path = "Images/Trips/" . $timgs['name'][$i];
                    move_uploaded_file($tmp, $path);
                    array_push($tripImages, $path);
                }
                $newTripImages = json_encode($tripImages);
                $updateQuery = "UPDATE `trips` SET `tname` = '$tname' , `tprice` = '$tprice' , `tcat` = '$tcat' , `tdesc` = '$tdesc' , `tguide` = '$tguide' , `tdate` = '$tdate' , `timgs` = '$newTripImages' , `tplace` = '$tplace' WHERE `tid` = '$tripId'";
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
                    <h1>Update Trip (<?php echo $trip['tname']; ?>)</h1>
                    <input type="text" placeholder="Trip Name" name="tname" value="<?php if (isset($trip['tname'])) {
                                                                                        echo $trip['tname'];
                                                                                    } ?>" />
                    <input type="text" placeholder="Trip Price" name="tprice" value="<?php if (isset($trip['tprice'])) {
                                                                                            echo $trip['tprice'];
                                                                                        } ?>" />
                    <input type="text" placeholder="Trip Category" name="tcat" value="<?php if (isset($trip['tcat'])) {
                                                                                            echo $trip['tcat'];
                                                                                        } ?>" />
                    <input type="text" placeholder="Trip Description" name="tdesc" value="<?php if (isset($trip['tdesc'])) {
                                                                                                echo $trip['tdesc'];
                                                                                            } ?>" />
                    <input type="text" placeholder="Trip Guide" name="tguide" value="<?php if (isset($trip['tguide'])) {
                                                                                            echo $trip['tguide'];
                                                                                        } ?>" />
                    <select name="place">
                        <option value="">Select Place</option>
                        <?php
                        foreach ($places as $place) {
                        ?>
                            <option value="<?php echo $place[1] ?>"><?php echo $place[1] ?></option>
                        <?php
                        }

                        ?>
                    </select>
                    <input type="date" name="tdate" value="<?php if (isset($trip['tdate'])) {
                                                                echo $trip['tdate'];
                                                            } ?>" />
                    <input type="file" name="timg[]" multiple />
                    <input type="submit" value="Update Trip" name="updatetrip">
                </form>
            </div>
        </section>
    </body>

    </html>

<?php }
?>