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
        <title>Update Place</title>
    </head>

    <body>
        <?php
        include('adminnav.php');
        $placeId = $_GET['place'];
        $selectQuery1 = "SELECT * FROM `places` WHERE `pid` = '$placeId'";
        $selectDone1 = mysqli_query($conn, $selectQuery1);
        $place = mysqli_fetch_assoc($selectDone1);


        if (isset($_POST['updateplace'])) {
            $pname = htmlspecialchars($_POST['pname']);
            $pdesc = htmlspecialchars($_POST['pdesc']);
            $pimg = $_FILES['pimg'];
            $errors = [];
            if ($pname == "" && $pdesc == "") {
                $errors['placeserror'] = "Fields are required";
            } else {
                if (empty($errors)) {
                    $tmp = $pimg['tmp_name'];
                    $path = 'Images/Places/' . $pimg['name'];
                    move_uploaded_file($tmp, $path);
                    // $updateQuery = "update INTO `places` (`pname`,`pdesc`,`pimg`) VALUES ('$pname','$pdesc','$path')";
                    $updateQuery = "UPDATE `places` SET `pname` = '$pname' , `pdesc` = '$pdesc' , `pimg` = '$path' WHERE `pid` = '$placeId'";
                    $updateDone = mysqli_query($conn, $updateQuery);
                    if ($updateQuery) { ?>
                        <div class="success-message">
                            <div class="done">
                                <h1>Place was Updated Successfully</h1>
                                <a href="viewplaces.php">Confirm</a>
                            </div>
                        </div>
        <?php }
                }
            }
        }
        ?>
        <section class="signContainer">
            <img src="<?php echo $place['pimg']; ?>" alt="" />
            <div class="formContainer">
                <form method="post" enctype="multipart/form-data">
                    <h1>Update <?php if (isset($place['pname'])) {
                                    echo $place['pname'];
                                } ?></h1>
                    <?php
                    if (isset($errors['placeserror'])) { ?>
                        <span><?php echo $errors['placeserror']; ?></span>
                    <?php }
                    ?>
                    <input type="text" placeholder="Place Name" name="pname" />
                    <?php
                    if (isset($errors['nameerror'])) { ?>
                        <span><?php echo $errors['nameerror']; ?></span>
                    <?php }
                    ?>
                    <input type="text" placeholder="Place Description" name="pdesc" />
                    <input type="file" name="pimg" />
                    <input type="submit" value="Update <?php echo $place['pname']; ?>" name="updateplace">
                </form>
            </div>
        </section>
    </body>

    </html>

<?php }
?>