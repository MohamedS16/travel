<?php
require('conn.php');
$tripId = $_GET['trip'];
$selectQuery = "SELECT * FROM `trips` WHERE `tid` = '$tripId'";
$selectDone = mysqli_query($conn, $selectQuery);
$trip = mysqli_fetch_assoc($selectDone);
$description = explode('*',$trip['tdesc']);
$images = explode(' ', $trip['timgs']);
// $tripImages = json_decode($trip['timgs']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/singletrip.css">
    <link rel="stylesheet" href="css/footer.css">
    <title><?php if(isset($trip)){echo $trip['tname'];} ?></title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <section class="singleTripContainer">
        <div class="tripData">
            <img src="<?= $images[0] ?>" alt="Main Image" />
            <div class="singleTripDetails">
                <h1><?= $trip['tname'] ?></h1>
                <?php  foreach($description as $item){?> <p> <?= $item ?> </p>  <?php } ?>
                <h3>Book Now Through :</h3>
                <div class="booking-ways">
                    <a href="#" title="Message ON Facebook" target="_blank" > <img src="./Images/facebook.png" alt="FaceBook"> </a>
                    <a href="https://wa.me/+201124449731" target="_blank" title="Message On Whatsapp"> <img src="./Images/whatsapp.png" alt="WhatsApp"> </a>
                    <a href="./contact.php" target="_blank" title="Contact Form"> <img src="./Images/exam.png" alt="Form"> </a>
                </div>
            </div>
        </div>
        <div class="trip-images">
            <h2>More Images</h2>
            <div class="singleTripGallery">
            <?php
            foreach ($images as $image) {?>
                <img src="<?= $image ?>" alt="">
            <?php }
            ?>
            </div>
        </div>
    </section>
    <?php
    include('footer.php');
    ?>
</body>

</html>



