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
        $selectQuery = "SELECT * FROM `places`";
        $selectDone = mysqli_query($conn, $selectQuery);
        $data = mysqli_fetch_all($selectDone);
        if (isset($_POST['addtrip'])) {
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
                $insertQuery = "INSERT INTO `trips` (`tname`,`tprice`,`tcat`,`tdesc`,`tguide`,`tdate`,`timgs` , `tplace`) VALUES ('$tname' , '$tprice','$tcat','$tdesc','$tguide','$tdate','$newTripImages' ,'$tplace')";
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
        }
        ?>
        <section class="signContainer">
            <img src="../Images/Home/bg3.jpg" alt="" />
            <div class="formContainer">
                <form method="post" enctype="multipart/form-data" style="padding: 40px ; margin-top : 50px">
                    <h1>Add Trip</h1>
                    <input type="text" placeholder="Trip Name" name="tname" />
                    <input type="text" placeholder="Trip Price" name="tprice" />
                    <input type="text" placeholder="Trip Category" name="tcat" />
                    <input type="text" placeholder="Trip Description" name="tdesc" />
                    <input type="text" placeholder="Trip Guide" name="tguide" />
                    <select name="place">
                        <option value="">Select Place</option>
                        <?php
                        foreach ($data as $place) {
                        ?>
                            <option value="<?php echo $place[1] ?>"><?php echo $place[1] ?></option>
                        <?php
                        }

                        ?>
                    </select>
                    <input type="date" name="tdate" />
                    <input type="file" name="timg[]" multiple />
                    <input type="submit" value="Add Trip" name="addtrip">
                </form>
            </div>
        </section>
    </body>

    </html>
<?php

}
?>