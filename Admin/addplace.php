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
        <title>Add Place</title>
    </head>

    <body>
        <?php
        include('adminnav.php');
        if (isset($_POST['addplace'])) {
            $pname = htmlspecialchars($_POST['pname']);
            $pdesc = htmlspecialchars($_POST['pdesc']);
            $pimg = $_FILES['pimg'];
            $errors = [];
            if ($pname == "" && $pdesc == "") {
                $errors['placeserror'] = "Fields are required";
            } else {
                $selectQuery = "SELECT * FROM `places`";
                $selectDone = mysqli_query($conn, $selectQuery);
                $data = mysqli_fetch_all($selectDone);
                foreach ($data as $place) {
                    if ($pname == $place[1]) {
                        $errors['nameerror'] = "Place is already added";
                    }
                }
                if (empty($errors)) {
                    $tmp = $pimg['tmp_name'];
                    $path = 'Images/Places' . $pimg['name'];
                    move_uploaded_file($tmp, $path);
                    $insertQuery = "INSERT INTO `places` (`pname`,`pdesc`,`pimg`) VALUES ('$pname','$pdesc','$path')";
                    $insertDone = mysqli_query($conn, $insertQuery);
                    if ($insertDone) { ?>
                        <div class="success-message">
                            <div class="done">
                                <h1>Place Added Successfully</h1>
                                <a href="addplace.php">Confirm</a>
                            </div>
                        </div>
        <?php }
                }
            }
        }
        ?>
        <section class="signContainer">
            <img src="../Images/Home/bg.jpg" alt="" />
            <div class="formContainer">
                <form method="post" enctype="multipart/form-data">
                    <h1>Add Place</h1>
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
                    <input type="submit" value="Add Place" name="addplace">
                </form>
            </div>
        </section>
    </body>

    </html>

<?php }
?>